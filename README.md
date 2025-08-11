
# Vitrine Virtual com Carrossel Dinâmico
Este projeto consiste em uma vitrine virtual desenvolvida com Angular que exibe um carrossel de imagens dinâmico, informações sobre a empresa e dados de contato.

O conteúdo do site é gerenciado por um administrador através de um painel de controle seguro, alimentado por uma API RESTful construída com Laravel. A autenticação do painel é gerenciada pelo Laravel Breeze (em modo API) e Sanctum.


## Arquitetura
* Frontend: Aplicação Angular (Single-Page Application).

* Backend: API RESTful em Laravel.

* Banco de Dados: MySQL.

### Funcionalidades Frontend Angular

* Carrossel de Imagens Automatizado: Exibe as imagens cadastradas pelo administrador em um slideshow que transita automaticamente.

* Seção "Sobre Nós": Apresenta a história do grupo e os produtos ou serviços com os quais trabalham.

* Informações de Contato: Exibe de forma clara os contatos da empresa: telefone, e-mail, endereço.

### Funcionalidades Backend Laravel

* Painel de Controle Seguro: Uma área administrativa protegida por login e senha, acessível apenas pelo administrador.

* Gerenciamento de Imagens (CRUD): Dentro do painel, o administrador pode realizar as seguintes ações no carrossel:

* Criar: Adicionar novas imagens.

* Ler: Visualizar todas as imagens cadastradas.

* Deletar: Remover imagens do carrossel.


