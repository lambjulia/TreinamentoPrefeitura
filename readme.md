<h1> Projeto TreinamentoPrefeitura </h1>
<h4> Esse projeto foi desenvolvido após eu passar na seleção para estagiária para a prefeitura de São Leopoldo como um treinamento.</h4>

<h3>Sobre o projeto:</h3>

<p>Neste projeto de treinamento foi utilizado o modelo de layout de padrão da prefeitura, junto com o projeto TestePrefeitura que fiz para conseguir a vaga.</p>
<p>Apliquei o sistema do teste no layout da prefeitura e fiz melhorias solicitadas.</p>
<p>O sistema possui cadastro de pessoas, de protocolos vinculados a essas pessoas cadastradas, cadastro de usuários com nível de acesso, cadastro de departamentos e auditoria.</p>
<p>No cadastro de uma pessoa consta o nome, data de nascimento, CPF, sexo, cidade, bairro, rua, número e complemento.</p>
<p>No cadastro de protocolo consta a descrição do protocolo, a data, o prazo, uma dropdown list com as pessoas cadastradas e uma dropdown list com os departamentos para ser vinculado um protocolo não pode ser registrado sem uma pessoa e um departamento para ser vinculado.</p>
<p>No cadastro de usuários consta nome, email, CPF, nível de usuário e senha.</p>
<p>No cadastro de departamento consta o nome e após o cadastro, pode ser vinculado um usuário a este departamento.</p>
<p>O sistema possui tabelas listando as pessoas cadastradas e os protocolos, onde se pode ser os cadastros, editar e excluir. Na tabela de protocolos o usuário só ve os protocolos que estejam vinculados a departamentos que o usuário também esta. Nas tabelas tem uma barra de pesquisa.</p>
<p>O sistema tem limitação com login, onde só o usuário de nível mais alto pode cadastrar os outros.</p>

<h3>Como instalar o projeto:</h3>
<p>A .env já esta no projeto.</p>
<p>Você pode baixar o projeto ou usar o comando:</p>
<p>git clone https://github.com/lambjulia/TreinamentoPrefeitura.git</p>
<p>Crie um banco com o nome 'TreinamentoPrefeitura'</p>
<p>No terminal do projeto rode os seguintes comandos:</p>
<p>composer install</p>
<p>php artisan migrate --seed</p>
<p>php artisan serve</p>
<p>E abra o servidor no navegador com http://127.0.0.1:8000/</p>
<p>Entre com o login:</p>
<p>email: julilamb2000@hotmail.com</p>
<p>senha: 12345678</p>

