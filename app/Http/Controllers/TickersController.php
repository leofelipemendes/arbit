<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\TickerCreateRequest;
use App\Http\Requests\TickerUpdateRequest;
use App\Repositories\TickerRepository;
use App\Validators\TickerValidator;
use App\Services\TickerService;
/**
 * Class TickersController.
 *
 * @package namespace App\Http\Controllers;
 */
class TickersController extends Controller
{
    /**
     * @var TickerRepository
     */
    protected $repository;

    /**
     * @var TickerValidator
     */
    protected $validator;
    
    protected $service;

    /**
     * TickersController constructor.
     *
     * @param TickerRepository $repository
     * @param TickerValidator $validator
     */
    public function __construct(TickerRepository $repository, TickerValidator $validator,TickerService $service)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service = $service;
    }
    
    public function getTicker() {
        //return $this->service->getApiTicker();
        $data = $this->service->getApiTicker();
        return view('include.share', compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $tickers = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tickers,
            ]);
        }

        return view('tickers.index', compact('tickers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TickerCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(TickerCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $ticker = $this->repository->create($request->all());

            $response = [
                'message' => 'Ticker created.',
                'data'    => $ticker->toArray(),
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
        $ticker = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $ticker,
            ]);
        }

        return view('tickers.show', compact('ticker'));
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
        $ticker = $this->repository->find($id);

        return view('tickers.edit', compact('ticker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TickerUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(TickerUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $ticker = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Ticker updated.',
                'data'    => $ticker->toArray(),
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
                'message' => 'Ticker deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Ticker deleted.');
    }
}
