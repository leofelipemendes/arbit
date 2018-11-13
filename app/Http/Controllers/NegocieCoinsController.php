<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\NegocieCoinCreateRequest;
use App\Http\Requests\NegocieCoinUpdateRequest;
use App\Repositories\NegocieCoinRepository;
use App\Validators\NegocieCoinValidator;

/**
 * Class NegocieCoinsController.
 *
 * @package namespace App\Http\Controllers;
 */
class NegocieCoinsController extends Controller
{
    /**
     * @var NegocieCoinRepository
     */
    protected $repository;

    /**
     * @var NegocieCoinValidator
     */
    protected $validator;

    /**
     * NegocieCoinsController constructor.
     *
     * @param NegocieCoinRepository $repository
     * @param NegocieCoinValidator $validator
     */
    public function __construct(NegocieCoinRepository $repository, NegocieCoinValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $negocieCoins = json_decode($this->repository->getTickerBtcBrl(),true);
        return $negocieCoins;
  
        //return view('negocieCoins.index', compact('negocieCoins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NegocieCoinCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(NegocieCoinCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $negocieCoin = $this->repository->create($request->all());

            $response = [
                'message' => 'NegocieCoin created.',
                'data'    => $negocieCoin->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $negocieCoin = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $negocieCoin,
            ]);
        }

        return view('negocieCoins.show', compact('negocieCoin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $negocieCoin = $this->repository->find($id);

        return view('negocieCoins.edit', compact('negocieCoin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NegocieCoinUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(NegocieCoinUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $negocieCoin = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'NegocieCoin updated.',
                'data'    => $negocieCoin->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'NegocieCoin deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'NegocieCoin deleted.');
    }
}
