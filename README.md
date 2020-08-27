 # Como faz para rodar o projeto ? 
 Simples, da forma que está atualizado, o importante é ter na sua máquina a versão PHP 7.4.9. No meu caso eu utilizei essa versão e também usei o Xampp como fonte de servidor.
 
 1 - Depois de clonar o projeto, rode o comando: *composer install*, assim irá baixar todas as depedências. 
 2 - Se quando baixado não aparecer a versão mais atualizada, mude para a versão mais recente rodando o comando: *composer update*.
 
 # Composer e depedências utilizadas
 Se você acessar o projeto verá que possui um arquivo chamado *composer.json*, nesse arquivo contém todos os detalhes de componentes e arquivos instalados por fora. 
 
 # Coisas diferentes 
 O que teve a mais de diferentes só a utilização de componentes X blade. 
 
 Que isso reduziu bastante linha de código. Exemplo: 
 
 <input type="text" name="testando" placeholder="testando" class="form-control"></input>
 
 Usando X blade ou Blade X, reduzimos e fica da seguinte forma: 
 
 <x-form.input name="testando" placeholder="testando" />
 
 # Testes 
 
 Fiz pequenos testes na qual pode ser conferido na pasta: *tests/Feature* e *tests/Unit* 
 
 Os testes foram exatamente para verificar se os dados estavam sendo inseridos e as tabelas corretas e visualizar se as views estavam corretas. 
 
 
