<h2>Campos de busca</h2>

ID | CPF | Nome | Status(combobox) | Deficiência (combobox) 

<h2> Altetas </h2>

<table>
    <tr>
        <th>ID Usuário</th>
        <th>| Nome</th>
        <th>| Esporte</th>
        <th>| Deficiência</th>
    </tr>
    <tr>
        @foreach($athletetList as $athlete)
            <td> {{ $athlete->id   }} </td>
            <td> {{ $athlete->name }} </td>
        @endforeach
    </tr>
</table>