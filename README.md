Teste Técnico
deploy: https://teste-tecnico-git-main-yantisousa.vercel.app/

API:
 
 Rota de cadastro de eletrodoméstico: 
 Rota: https://teste-tecnico.portfolioyansousa.com/back-end/public/api/eletrodomestico/store
 Dados de entrada: nome, descricao, tensao e marca_id
 Dados de retorno:Valida os campos, valida se a tensão tem no minimo três caracteres e se termina com "v". Retorna a rota index que retorna todos os eletrodomésticos
 
 Rota de listagem de eletrodomésticos: 
 Rota: https://teste-tecnico.portfolioyansousa.com/back-end/public/api/eletrodomestico/index
 Dados de entrada: sem dados de entrada
 Dados de retorno: Retorna um objeto JSON com a listagem por ordem alfabética de todos os eletrodomésticos
 
 Rota de edição de eletrodoméstico: 
 Rota: https://teste-tecnico.portfolioyansousa.com/back-end/public/api/eletrodomestico/update/{eletrodomestico}
 Dados de entrada: nome, descricao, tensao e marca_id e o id do eletrodomestico vai na rota para realizar a atualizaçaõ de registros
 Dados de retorno:Valida os campos, valida se a tensão tem no minimo três caracteres e se termina com "v". Retorna um objeto JSON com a listagem por ordem alfabética de todos os eletrodomésticos
 
 Rota de deletar de eletrodoméstico: 
 Rota: https://teste-tecnico.portfolioyansousa.com/back-end/public/api/eletrodomestico/destroy/{eletrodomestico}
 Dados de entrada: O id do eletrodomestico vai na rota para realizar a remoção de registros de acordo com o id, usando injeção de dependência.
 Dados de retorno:Retorna um objeto JSON com a listagem por ordem alfabética de todos os eletrodomésticos com o relacionamento das marcas.

 
 
Rota de listagem de marcas:

Rota: https://teste-tecnico.portfolioyansousa.com/back-end/public/api/marcas/index
Dados de entrada: Sem dados de entrada
Dados de retorno: Retorna todas as marcas por ordem alfábetica e traz a contagem de produtos(eletrodomésticos) que ela tem.
