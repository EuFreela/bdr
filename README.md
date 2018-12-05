# AVALIAÇÃO

### INSTALAÇÃO

<ul>
  <li><b>1. Ambiente de desenvolvimento:</b> o sistema foi desenvolvido em LAMP (Linux Apache Mysql PHP). Porém, não há  conflitos quanto a outros servidores desde que seja php.</li>
  <li>2. Estou usando o Auth padrão do laravel para criação do acesso ao sistema com login e senha. Como não esta no documento de requisitos, resolvi usá-la por ser mais rápido. A recuperação de senha e envio por e-mail não foi implementado, mas, teho um packger já feito para este fim. Resolvi fazer manualmente para que o conceito fique claro: <a href="https://packagist.org/packages/lameck/lauth">LAUTH</a>.</li>
  <li>3. Layout: Eu mantive o uso do bootstrap 4.1. Posso criar um novo layout como posso utilizar algum pronto. Resolvi usar o recurso por ser mais rápido. Contudo, encontra-se responsivo.</li>
</ul>

#### LINUX: INSTALAÇÃO DO LAMP
<p>Para lhe auxiliar na istalaço e configuração do sistema, este arquivo poderá ser útil: <a href="https://github.com/EuFreela/LIBRAKIDS/blob/master/install.sh">install.sh</a></p>
<p>Para usá-lo, baixe-o. Abra o terminal e execute-o: <b>sudo sh install.sh</b></p>
<p>Caso exista a necessidade de instalação manual, instale  o PHP e o MySql<p>

#### WINDOWS/MAC: INSTALAÇÃO DO XAMP

<p>Baixe-o <a href="https://www.apachefriends.org/pt_br/index.html">XAMP</a>. Instale-o</p>

  
#### DER
<p>Existe um diretório, n este projeto, contendo um arquivo chamado DER (Diagrama de Entidade Relacional). Este DER pode ser aberto com o WorkBanch e logo importado para o MySql. Contudo, isponibilizei junto um arquivo SQL para ser importado manualmente - caso exista a necessidade. Isso é uma medida de segurança. Não criei o iagrama no Laravel por saber que pode existir algum conflito entre máquinas e entre versões do MySql ao executar as migrations forçando um migrate por ordem de primarykey. Outro motivo é que para um sistema complexo e grande, o seeder não é viável.</p>


<p>Após subir o banco de dados, é preciso configurá-lo no arquivo <b>.env</b> do sistema inserindo as credenciais de acesso ao MySql (a mesma senha usada no phpmyadmin) </p>

<pre>
DB_DATABASE=nome_do_banco_de_dados
DB_USERNAME=usuario_banco_de_dados
DB_PASSWORD=sua_senha
</pre>
    
<p>Após, é preciso popular o banco de dados com as informações default e criar demais tabelas. Abra o terminal no diretório e execute: <b>php artisan migrate</b>, esse comando cria as tabelas definidas na migrate. Execute agora <b>php artisan db:seed</b>, esse comando irá popular as tabelas criadas.</p>

<p><b>Observação: </b> Eu não criei migrates das tabelas pedidas, para tarefas, por saber onde exatamente poderá ser implementado. Além disso, preferi fazê-lo de maneira descentralizada a exemplo. Neste git, se quiser ver as migrates sendo usaas, basta navegar no meu repositório. A maneira descentralizada é interessante para sistemas com um número maior de tabelas.</p>

<hr>

### USO

<p>Após instalado as dependencias acima, vamos entrar no sistema. Existem duas formas de entrar no sistema:</p>

<ul>
   <li>1. Se estiver no linux: o diretório da raíz deverá estar dentro do apache (/var/www/html/bdr). Além disso, será preciso dar permissão de execução ao mesmo <b>sudo chmod -R 777 bdr</b>, e após permitir que o apache seja o interlocutor <b>sudo chown seu_usuario:www-data</b>. Configuraçes manuais de um servidor Linux. Para acessar o sistema, por esta opção, <b>http://seu_ip ou localhost/bdr/public/index.php</b></li>
  <li>2. Se estiver usando o windows: o diretório da raiz deverá estar dentro do xamp. Por default, o diretório é C:/xamp/httd/</li>
  <li>3. Por motivos de facilitar o uso deste exemplo, podemos usar o servidor interno do Laravel. Entre com um terminal no diretório a aplicação (cd bdr/). Execute o comando <b>php artisan serve</b>. O sistema irá rodar, por default, na porta 8080. Basta acessar a URL informada que será: http://localhost:8000/. Para usar esta opço, não há necessidade de jogar a aplicaço dentro de um servidor php.</li>
</ul>

<p>A página inicial é de boas vindas. Para acessar o sistema você everá clicar no link na parte superior esquerda: login; ou registo. Caso no tenha cadastro, basta criar um e entrar no sistema.</p>

### API

<p>A api foi desenvolvida e documentada na ferramenta POSTMAN. A coleção se encontra na diretório API e sua documentaçao no link <a href="https://documenter.getpostman.com/view/5603672/RzffLAW5#e9953fe7-cc3c-42ca-bc72-03ca5394d04c">API DOCUMENTAÇÃO</a>.</p>

<p>Foi criado um middleware para controle com o auth do sistema: APICheckJWTMiddleware</p>
<p>Para criação de TOKEN foi utilizado o recurso JWT.</p>

