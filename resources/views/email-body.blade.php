<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Currículo Recebido</title>
    <style>
        body {
            font-family: sans-serif;
            line-height: 1.6;
            color: #333;
        }
        strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Currículo Recebido</h1>
    <p>Um novo currículo foi enviado através do formulário.</p>
    <hr>
    
    <h2>Dados do Candidato</h2>
    <p><strong>Nome:</strong> {{ $curriculo->nome }}</p>
    <p><strong>Email:</strong> {{ $curriculo->email }}</p>
    <p><strong>Telefone:</strong> {{ $curriculo->telefone }}</p>
    <p><strong>Cargo Desejado:</strong> {{ $curriculo->cargo_desejado }}</p>
    <p><strong>Escolaridade:</strong> {{ $curriculo->escolaridade }}</p>
    <p><strong>Observações:</strong> {{ $curriculo->observacoes ?? 'Nenhuma observação foi adicionada.' }}</p>
    <hr>

    <h2>Informações de Envio</h2>
    <p><strong>IP de Envio:</strong> {{ $curriculo->ip_visitante }}</p>
    <p><strong>Data de Envio:</strong> {{ $curriculo->created_at->format('d/m/Y H:i:s') }}</p>
    <br>
    <p>O arquivo do currículo está em anexo neste e-mail.</p>

</body>
</html>