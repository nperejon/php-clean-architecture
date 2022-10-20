# Boilerplate PHP - A boilerplate to PHP Clean Architecture Project

### Tabela de conteúdos
=================

 * Objetivo
 * O que é Arquitetura Limpa
 * As camadas da Arquitetura Limpa
    -  As Camadas
 * Setup da Aplicação
    - Pré-requisitos
    - Rodando o projeto em ambiente de desenvolvimento
 * Referências

## Objetivo
O objetivo principal desta aplicação é servir como boilerplate para projetos feitos na linguagem PHP utilizando o conceito de Arquitetura Limpa.

## O que é Arquitetura?
Na percepção de Robert C. Martin, idealizador da Arquitetura Limpa, a arquitetura é a percepção macro de uma aplicação e para defender a existência de uma arquitetura para o software, o autor percebe uma relação de proporcionalidade entre qualidade do design - que é a percepção micro - e o esforço de mantimento do produto.
<br><br>
> Se o esforço for baixo e se mantiver assim ao longo da vida do sistema, o design é bom. Se esforço aumentar a cada novo release ou nova versão, o design é ruim
>
> Robert C. Martin, **Arquitetura Limpa**, p. 35

<br>

## O que é Arquitetura Limpa?
Citando Robert C. Martin, o professor Otávio Lemos ressalta em seu livro "Arquitetura Limpa Na Prática" que _a Arquitetura Limpa é uma tentativa de integrar várias arquiteturas desenvolvidas nas últimas décadas em uma ideia prática._

## As camadas da Arquitetura Limpa
A Arquitetura Limpa é composta por várias camadas, cada uma delas poderá ser testada unicamente e não tem dependência com sua externa. As camadas se comunicam de fora para dentro através de abstrações, sendo que, quanto mais próximo do centro mais próximo é do abstrato, portanto, quanto mais próximo do centro mais estável e quanto mais se apróxima do externo, mais ele será volátil.

<img alt="The Clean Architecture structure" src="https://imgur.com/AKN1koF.png" />

### As Camadas
- Entities - As entidades representam as regras de negócio da aplicação, Robert C. Martin diz que _uma entidade é um objeto dentro do nosso sistema de computador que engloba um pequeno conjunto de regras de negócio críticas operando em Dados Críticos de Negócio_.
- Use Cases - Presentes regras de negócio da aplicação, são as principais funcionalidades da aplicação no conceito de Arquitetura Limpa. Como dito pelo professor Lemos, _os casos de uso implementam as operações de alto nível_ e também que essa camada é responsável pela implementação de features para as entidades do projeto, é a camada de lógica.
- Interface Adapters - Também conhecida como camada de acesso, é a camada que permite uma conexão entre os frameworks e bibliotecas externas com a aplicação, o professor Lemos define tal camada como _um conjunto de adaptadores que convertem dados de e para os casos de uso_.
- Frameworks & Drivers - Projetos externos dos quais serão utilizados na aplicação e que não temos total controle sobre seus comportamentos ou falhas, devem poder ser facilmente substituídos por outras bibliotecas ou frameworks e não devem estar integrados com as regras de negócio. É uma camada altamente volátil.

## Setup da Aplicação
### Pré-requisitos
- PHP
- Composer

### Rodando o projeto em ambiente de desenvolvimento



## Referências
- [Arquitetura Limpa Na Prática - Otávio Lemos](https://pay.hotmart.com/O59619511K?bid=1666233080668)
- [Arquitetura limpa: O guia do artesão para estrutura e design de software - Robert C. Martin](https://www.amazon.com.br/Arquitetura-Limpa-Artes%C3%A3o-Estrutura-Software/dp/8550804606/ref=asc_df_8550804606/?tag=googleshopp00-20&linkCode=df0&hvadid=379787347388&hvpos=&hvnetw=g&hvrand=17159789854379705547&hvpone=&hvptwo=&hvqmt=&hvdev=c&hvdvcmdl=&hvlocint=&hvlocphy=9100004&hvtargid=pla-809227152896&psc=1)
- [Solidbook - Khalil Stemmler](https://solidbook.io/)
- [Comparison of Domain-Driven Design and Clean Architecture Concepts - Khalil Stemmler](https://khalilstemmler.com/articles/software-design-architecture/domain-driven-design-vs-clean-architecture/)