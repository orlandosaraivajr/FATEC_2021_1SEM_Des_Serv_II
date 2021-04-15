<h3>Novo Cliente </h3>

<form action="{{ route('cliente.store')}}" method="POST">
    @csrf
    <input type="text" name="nome">
    <input type="submit" value="Salvar">
</form>