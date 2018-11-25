<table class="table table-striped cell-border">
        <thead>
            <tr>
                <th>Exchange</th>
                <th>Ultimo preço</th>
                <th>Maior</th>
                <th>Menor</th>
                <th>Compra</th>
                <th>Venda</th>
                <th>Spread</th>
                <th>Volume</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
  @foreach(json_decode($data,true) as $d)
  <tr>
      <td> {{ $d['exchange']['name'] }} </td>
      <td> {{ 'R$ '.number_format($d['exchange']['last'], 2, ',', '.') }} </td>
      <td> {{ 'R$ '.number_format($d['exchange']['high'], 2, ',', '.') }} </td>
      <td> {{ 'R$ '.number_format($d['exchange']['low'], 2, ',', '.') }} </td>
      <td> {{ 'R$ '.number_format($d['exchange']['buy'], 2, ',', '.') }} </td>
      <td> {{ 'R$ '.number_format($d['exchange']['sell'], 2, ',', '.') }} </td>
      <td> {{ $d['exchange']['spread'] }}% </td>
      <td> {{ $d['exchange']['vol'] }} </td>
      <td> {{ date('d-m-Y h:i:m', strtotime($d['exchange']['date'])) }} </td>
  
  </tr>
  @endforeach
  <tbody>
  </table>
