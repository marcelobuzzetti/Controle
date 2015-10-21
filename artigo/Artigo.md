
Desenvolvimento de Sistema para controle dos meios de transporte

Marcelo Aparecido Ferreira

Curso Superior em Tecnologia em Análise e Desenvolvimento de
Sistemas
Instituto Federal de São Paulo – Campus Hortolândia (IFSP)

marcelobuzzetti@gmail.com

Resumo. Atualmente, informações rápidas e confiáveis são um
diferencial no mercado. A utilização de bancos de dados para
controle e disponibilização dessas informações se faz
necessário para uma melhor organização e gestão dessas
informações. Tendo em vista essa necessidade este trabalho
busca a criação de uma ferramenta web para suporte ao processo
decisório, buscando prover um maior controle gerencial e
administrativos dos meios de transporte de uma empresa. A
partir da extração das funcionalidades disponíveis em um
protótipo funcional desenvolvido anteriormente para plataforma
desktop e em uso, pretende-se projetar e implementar um sistema
Web em linguagem PHP com SQL.

1. Introdução

Informações são, e sempre serão, necessárias em qualquer
empresa, negócio ou atividade (SILBERSCHATZ, KORTH E SUDARSHAN,
2012, p. 1). Mas, para se obter uma boa informação, são
necessários dados que devem ser obtidos da melhor maneira
possível (BARBIERI, 2011, p. 963) para garantir a integridade
da informação.

Banco de dados é um conjunto de dados (ALVES, 2009, p. 23), onde
dado é uma representação simbólica (isto é, feita por meio de
símbolos), quantificada ou quantificável (SETZER e CORRÊA DA
SILVA, 2005, p. 2). Segundo Silberschatz, Korth e Sudarshan
(2012, p. 2), toda empresa possui um banco de dados que mantém
os dados de seu negócio, como: vendas, contabilidade, recursos
humanos entre outros.

Os dados isolados têm um valor pequeno quando comparados ao seu
agrupamento. Para gerar essas informações são necessárias
ferramentas que analisem o banco de dados e forneçam
informações úteis, inteligíveis e interessantes para que
sejam utilizadas como suporte as decisões da empresa. A partir
dessa necessidade, surge a percepção de que os sistemas de
ambiente operacional e ambiente analítico devem ser tratados de
forma diferenciada, resultando então no que é chamado Sistemas
de Suporte à Decisão (SSD) que, segundo Inmon (1996), são
“sistemas que realizam o processamento analítico e provêm as
informações necessárias ao usuário decisor, permitindo a
análise de situações e a tomada de decisões”.

O departamento de transportes da empresa tem por missão
disponibilizar meios de transporte para as diversas funções da
empresa, controlar o uso dos recursos destinados aos mesmos,
gerenciar o time de motoristas, manter os veículos em condições
de utilização e controlar o uso dos veículos.

Para o controle de abastecimento dos veículos foi desenvolvido
um um protótipo que está em funcionamento, uma aplicação
desktop em linguagem JAVA. O protótipo possuí um cadastro de
abastecimento com os campos motorista, veículo, destino,
odômetro, tipo de combustível e quantidade abastecida. Gera
relatório de consumo por veículo e por tipo de combustível.
Possuí uma função experimental que pesquisa no Google Maps (um
sistema web que disponibiliza um mapa geográfico mundial) e a
distância entre dois pontos e retorna a distância e a
quantidade de combustível necessária para o deslocamento com
base na média de consumo de cada veículo. Foi utilizada a IDE
NetBeans 8.0.2 para o desenvolvimento da aplicação e possuí uma
base de dados populada utilizando a linguagem SQL.

O objetivo deste trabalho é a evolução da aplicação desktop para
uma plataforma web. Serão disponibilizados os percursos
realizados pelos veículos, controle de quilômetros rodados
pelos motoristas, tempo de deslocamento de cada percurso e
disponibilização dos destinos de cada veículo, tornando
transparente o uso dos mesmo, permitindo o cadastro de veículos
e de motoristas, histórico de deslocamentos de veículos e
motoristas e controle de abastecimentos. Com tais informações,
busca-se prestar um suporte a decisões futuras como qual ou
quais veículos devem ser manutenidos e qual ou quais motorista
estão mais sobrecarregados.

Esse trabalho é composto pela Seção 2 que apresenta a
fundamentação teórica deste trabalho. Na Seção 3 é apresentada
a metodologia que será utilizada e na Seção 4 são apresentados
os resultados parciais.

2. Fundamentação Teórica

Para a evolução do sistema foi feito uma análise do protótipo em
uso para verificar como suas atuais funções atendem a empresa e
determinar quais funções devem ser desenvolvidas para atender a
nova demanda, além de verificar como foi a aceitação da
aplicação desktop.

Devido a ideia de disponibilizar a informação dos percursos e
permitir o acesso ao sistema de vários dispositivos, optamos
por evoluir para uma aplicação web. O desenvolvimento de uma
aplicação web permite uma implantação mais rápida e possuí uma
usabilidade maior, tendo em vista que na empresa em questão
todos os serviços são em plataforma web.

A partir disso, levantamos como linguagem para desenvolvimento o
PHP e definimos a IDE NetBeans 8.0.2 para o desenvolvimento do
código-fonte por ser gratuito, de código aberto para
desenvolvedores e multiplataforma, executando em Windows,
Linux, Solaris e MacOS, e o SGBD MySql para o gerenciamento do
banco de dados e codificação da linguagem SQL.

3. Desenvolvimento do trabalho

O trabalho a ser desenvolvido visa um suporte ao gerenciamento
do departamento responsável por todos os meios de transporte
disponíveis em uma organização e, também, responsável por todas
as necessidades logísticas, administrativas e operacionais
referentes aos meios de transporte.

Os métodos de controle e gerenciamento utilizados são o lápis e
papel. A empresa não possui nenhuma ferramenta computacional
disponível para tal controle. Através de um estudo do cenário,
percebeu-se que o desenvolvimento de uma ferramenta web
tornaria o acesso ao sistema mais fácil devido todos os
sistemas da empresa serem aplicações web.

O foco principal no controle de meios de transportes está no
consumo de combustível, então será possível a empresa
quantificar o consumo real de cada veículo e prever a
necessidade de abastecimento futuro, evitando que os veículos
fiquem sem combustível, controlando os quilômetros percorridos
pelos motoristas, informando em tempo real os veículos que se
encontram em deslocamento como também a sua chegada. E através
dos dados coletados gerar informações úteis para prestar
suporte a decisões, tais como: quais veículos consomem mais e
quais motoristas rodaram mais.

Considerando que existe um protótipo validado pelos usuários, os
requisitos estarem bem compreendidos e ser uma evolução de um
sistema existente e o domínio das tecnologias a serem
utilizadas no desenvolvimento, a metodologia a ser seguida
segue o modelo Cascata (Pressman, 2011) com as seguintes fases:

Análise de Requisitos: onde serão levantados os novos requisitos
para a evolução da aplicação;

Projeto: descrever as tarefas técnicas, os riscos prováveis, os
recursos necessários, os produtos que serão produzidos e um
cronograma.

Implementação: codificação dos requisitos;

Testes (validação): validação do sistema e busca de defeitos;

Manutenção do software: esta fase fará parte de um projeto
futuro.

4. Resultados Parciais

Já foram levantados alguns requisitos, conforme apresentado no
Apêndice I, que envolvem a gestão de viaturas, motoristas,
deslocamentos, usuário, abastecimentos e desenvolvido um
protótipo conforme figuras abaixo:

[-- Image: Imagem1 --]inicio.png

Figura 1.Página Inicial

Fonte: Criado pelo autor

[-- Image: 1 --]percursos.png

Figura 2. Controle de Saída

Fonte: Criado pelo autor

[-- Image: 2 --]

Figura 3. Cadastro de Motoristas

Fonte: Criado pelo autor

[-- Image: 3 --]VIATURA.png

Figura 4. Cadastro de Viaturas

Fonte: Criado pelo autor

[-- Image: 4 --]USUARIO.png

Figura 5. Cadastro de Usuários

Fonte: Criado pelo autor

Referências

SILBERSCHATZ, Abraham; KORTH, Henry F.; SUDARSHAN, S.. SISTEMA
DE BANCO DE DADOS. 6 ed. Rio de Janeiro: Elsevier, 2011. 861p.

SOMMERVILLE, I. Engenharia de software. 6. ed., São Paulo:
Addison Wesley, 2003, 592p.

PRESSMAN, R. S. Engenharia de Software. 7. ed. Rio de Janeiro:
McGraw-Hill, 2011, 780p.

JALOTE, P. An Integrated Approach to Software Engineering. 3.
ed. New York: Springer, 2005, 566p.

INMON, W. H. Building the Data Warehouse. 2.ed. New York: John
Wiley & Sons, 1996.

Apêndice I - Análise de Requisitos

Requisitos funcionais (casos de uso)

1. Cadastro

a. [RF001] Cadastrar Viatura

Descrição do caso de uso: Este caso de uso permite que o usuário
crie e armazene uma nova viatura no sistema.

Entradas e pré-condições: não tem.

Saídas e pós-condição: uma viatura é cadastrado no sistema

b. [RF002] Excluir viatura

Descrição do caso de uso: Este caso de uso permite que o usuário
exclua uma viatura do cadastro do sistema.

Entradas e pré-condições: recebe como entrada o viatura que se
deseja excluir

Saídas e pós-condição: o usuário consegue excluir o viatura que
deseja

c. [RF003] Alterar viatura

Descrição do caso de uso: Este caso de uso permite que o usuário
altere os dados de uma viatura.

Entradas e pré-condições: recebe como entrada a viatura que se
deseja alterar.

Saídas e pós-condição: uma viatura é alterado no sistema.

d. [RF004] Cadastrar motorista

Descrição do caso de uso: Este caso de uso permite que o usuário
crie e armazene um novo motorista no sistema.

Entradas e pré-condições: não tem.

Saídas e pós-condição: um motorista é cadastrado no sistema

e. [RF005] Excluir motorista

Descrição do caso de uso: Este caso de uso permite que o usuário
exclua um motorista do cadastro do sistema.

Entradas e pré-condições: recebe como entrada o motorista que se
deseja excluir

Saídas e pós-condição: o usuário consegue excluir o motorista
que deseja

f. [RF006] Alterar motorista

Descrição do caso de uso: Este caso de uso permite que o usuário
altere os dados de um motorista.

Entradas e pré-condições: recebe como entrada o motorista que se
deseja alterar.

Saídas e pós-condição: um motorista é alterado no sistema.

g. [RF007] Cadastrar deslocamento

Descrição do caso de uso: Este caso de uso permite que o usuário
cadastre o deslocamento de uma viatura.

Entradas e pré-condições: recebe como entrada a viatura,
motorista, destino, horário de saída, odômetro de saída e
acompanhantes.

Saídas e pós-condição: um deslocamento e cadastrado no sistema.

h. [RF008] Encerrar deslocamento

Descrição do caso de uso: Este caso de uso permite que o usuário
encerrar o deslocamento de uma viatura.

Entradas e pré-condições: recebe como entrada um deslocamento,
horário de chegada, odômetro de chegada e alterações.

Saídas e pós-condição: um deslocamento é encerrado no sistema.

i. [RF009] Alterar deslocamento

Descrição do caso de uso: Este caso de uso permite que o usuário
altere os dados de um deslocamento.

Entradas e pré-condições: recebe como entrada o deslocamento que
se deseja alterar.

Saídas e pós-condição: um deslocamento é alterado no sistema.

j. [RF010] Excluir deslocamento

Descrição do caso de uso: Este caso de uso permite que o usuário
exclua um deslocamento do cadastro do sistema.

Entradas e pré-condições: recebe como entrada o deslocamento que
se deseja excluir

Saídas e pós-condição: o usuário consegue excluir o deslocamento
que deseja

k. [RF011] Cadastrar usuário

Descrição do caso de uso: Este caso de uso permite que o usuário
crie e armazene um novo usuário no sistema.

Entradas e pré-condições: não tem.

Saídas e pós-condição: um usuário é cadastrado no sistema

l. [RF012] Excluir usuário

Descrição do caso de uso: Este caso de uso permite que o usuário
exclua um usuário do cadastro do sistema.

Entradas e pré-condições: recebe como entrada o usuário que se
deseja excluir

Saídas e pós-condição: o usuário consegue excluir o usuário que
deseja

m. [RF013] Alterar usuário

Descrição do caso de uso: Este caso de uso permite que o usuário
altere os dados de um usuário.

Entradas e pré-condições: recebe como entrada a usuário que se
deseja alterar.

Saídas e pós-condição: um usuário é alterado no sistema.

n. [RF014] Cadastrar abastecimento

Descrição do caso de uso: Este caso de uso permite que o usuário
crie e armazene um novo abastecimento no sistema.

Entradas e pré-condições: recebe como entrada a viatura, tipo de
combustível, quantidade de combustível e data do abastecimento.

Saídas e pós-condição: um abastecimento é cadastrado no sistema

o. [RF015] Excluir abastecimento

Descrição do caso de uso: Este caso de uso permite que o usuário
exclua um abastecimento do cadastro do sistema.

Entradas e pré-condições: recebe como entrada o abastecimento
que se deseja excluir

Saídas e pós-condição: o usuário consegue excluir o
abastecimento que deseja

p. [RF016] Alterar abastecimento

Descrição do caso de uso: Este caso de uso permite que o usuário
altere os dados de um abastecimento.

Entradas e pré-condições: recebe como entrada o abastecimento
que se deseja alterar.

Saídas e pós-condição: um abastecimento é alterado no sistema.

2. Relatórios

a. [RF001] Gerar relatório de consumo de viaturas

Descrição do caso de uso: Este caso de uso permite que o usuário
gere relatórios sobre o consumo de combustível das viaturas.

Entradas e pré-condições: recebe como entrada a viatura ou grupo
de viaturas que se deseja saber o consumo.

Saídas e pós-condição: um relatório e gerado.

b. [RF002] Gerar relatório de quilometragem dirigida dos
motoristas

Descrição do caso de uso: Este caso de uso permite que o usuário
gere relatórios sobre a quilometragem dirigida dos motoristas.

Entradas e pré-condições: recebe como entrada o motorista ou
grupo de motoristas que se deseja saber a quilometragem rodada.

Saídas e pós-condição: um relatório e gerado.

c. [RF003] Gerar relatório de consumo de combustível

Descrição do caso de uso: Este caso de uso permite que o usuário
gere relatórios sobre o consumo de combustível das viaturas

Entradas e pré-condições: recebe como entrada a viatura ou o
grupo de viaturas que se deseja saber o consumo de combustível.

Saídas e pós-condição: um relatório e gerado.

2. Interface

a. [RF001] Visualizar viatura

Descrição do caso de uso: Este caso de uso permite que o usuário
visualize os dados de uma determinada viatura.

Entradas e pré-condições: deve receber como entrada o viatura
que se deseja visualizar.

Saídas e pós-condição: o usuário visualiza o viatura desejado

b. [RF002] Visualizar motorista

Descrição do caso de uso: Este caso de uso permite que o usuário
visualize os dados de um determinada motorista.

Entradas e pré-condições: deve receber como entrada o motorista
que se deseja visualizar.

Saídas e pós-condição: o usuário visualiza o motorista desejado

c. [RF003] Visualizar deslocamentos

Descrição do caso de uso: Este caso de uso permite que o usuário
visualize os dados de um determinada deslocamento.

Entradas e pré-condições: deve receber como entrada o
deslocamento que se deseja visualizar.

Saídas e pós-condição: o usuário visualiza o deslocamento
desejado.

d. [RF004] Visualizar abastecimentos

Descrição do caso de uso: Este caso de uso permite que o usuário
visualize os dados de um determinada abastecimento.

Entradas e pré-condições: deve receber como entrada o
abastecimento que se deseja visualizar.

Saídas e pós-condição: o usuário visualiza o abastecimento
desejado.

Requisitos não-funcionais

1. [NF001] Usabilidade

A interface com o usuário é de vital importância para o sucesso
do sistema. Principalmente por ser um sistema que não será
utilizado diariamente, o usuário não possui tempo disponível
para aprender como utilizar o sistema.

O sistema terá uma interface amigável ao usuário primário sem se
tornar cansativa aos usuários mais experientes.

2. [NF002] Desempenho

Embora não seja um requisito essencial ao sistema, deve ser
considerada por corresponder a um fator de qualidade de
software.

