#Configuração

1. Instalar as dependências do composer `composer install`
2. Passar o arquivo .env.example para o .env `cp ./.env.exemple ./.env`
3. Fazer a configuração do Google Drive API e Google Sheets API e colocar o arquivo .json na raiz do projeto nomeando para `credentials.json`
5. Copiar o spreadsheet ID do arquivo, que vai servir de configuração, para o .env
6. Adicionar o email e senha necessarios para autenticação da aplicação

###Caso esteja em desenvolvimento
1. Para rodar a aplicação em testes, rodar no terminal: `php -S localhost:8000 -t public`