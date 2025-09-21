<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio de Currículo - SESAP/RN</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <main class="page-container">

        <section class="header-section">
            <div class="logo">
                <img src="{{ asset('images/img.png') }}" alt="Logo da SESAP/RN">
                <h1>Trabalhe Conosco</h1>
                <p>Envie seu currículo para fazer parte da nossa equipe.</p>
            </div>
        </section>

        <section class="form-section">

            <h2>Formulário de Envio</h2>

            @if(session('success'))
                <div class="success-message">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="error-container">
                    <strong>Por favor, corrija os erros nos campos abaixo:</strong>
                </div>
            @endif

            <form action="{{ route('curriculo.store') }}" method="POST" enctype="multipart/form-data">
                @csrf 
                
                <div>
                    <label for="nome">Nome Completo</label>
                    <input type="text" id="nome" name="nome" value="{{ old('nome') }}" required>
                </div>
                 @error('nome')
                    <span class="error-message">{{ $message }}</span>
                @enderror

                <div>
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                </div>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror

                <div>
                    <label for="telefone">Telefone</label>
                    <input type="text" id="telefone" name="telefone" value="{{ old('telefone') }}" required>
                </div>
                @error('telefone')
                    <span class="error-message">{{ $message }}</span>
                @enderror

                <div>
                    <label for="cargo_desejado">Cargo Desejado</label>
                    <input type="text" id="cargo_desejado" name="cargo_desejado" value="{{ old('cargo_desejado') }}" required>
                </div>
                @error('cargo_desejado')
                    <span class="error-message">{{ $message }}</span>
                @enderror

                <div>
                    <label for="escolaridade">Escolaridade</label>
                    <select id="escolaridade" name="escolaridade" required>
                        <option value="" disabled {{ old('escolaridade') ? '' : 'selected' }}>Selecione o nível...</option>
                        <option value="Ensino Fundamental" {{ old('escolaridade') == 'Ensino Fundamental' ? 'selected' : '' }}>Ensino Fundamental</option>
                        <option value="Ensino Médio" {{ old('escolaridade') == 'Ensino Médio' ? 'selected' : '' }}>Ensino Médio</option>
                        <option value="Ensino Superior" {{ old('escolaridade') == 'Ensino Superior' ? 'selected' : '' }}>Ensino Superior</option>
                        <option value="Pós-Graduação" {{ old('escolaridade') == 'Pós-Graduação' ? 'selected' : '' }}>Pós-Graduação</option>
                    </select>
                </div>
                @error('escolaridade')
                    <span class="error-message">{{ $message }}</span>
                @enderror

                <div>
                    <label for="observacoes">Observações (opcional)</label>
                    <textarea id="observacoes" name="observacoes">{{ old('observacoes') }}</textarea>
                </div>
                @error('obeservações')
                    <span class="error-message">{{ $message }}</span>
                @enderror

               <div class="file-upload">
                    <label for="arquivo" class="file-upload-label">
                        <span>Escolher Arquivo</span>
                    </label>
                    <input type="file" id="arquivo" name="arquivo" required>
                    <span id="file-name" class="file-name-display">Nenhum arquivo selecionado</span>
                </div>
                @error('arquivo')
                    <span class="error-message">{{ $message }}</span>
                @enderror

                <button type="submit">Enviar Currículo</button>
            </form>
        </section>
    </main>

</body>
</html>