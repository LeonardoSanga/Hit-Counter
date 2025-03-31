# Contador de Acessos
A aplicação se propõe a registrar os acessos às três páginas do site: Início, Sobre e Contato. Essas informações são armazenadas em arquivos de texto e exibidas na tela Logs de Acesso para usuários que possuam a chave de acesso (<strong>"senha_da_nasa"</strong>). Além da quantidade de acessos a cada uma das páginas, um registro contendo o IP do usuário, o navegador utilizado e a data e horário de acesso é mantido para cada visita a uma das páginas.

## Infraestrutura e Deploy da Aplicação 
Para o <strong>deploy</strong> da aplicação, foi utilizada a infraestrutura da Amazon Web Services (AWS), especificamente uma instância Amazon EC2 (Elastic Compute Cloud). A instância foi provisionada com a imagem Ubuntu Server 22.04 LTS e configurada com um volume de armazenamento EBS (Elastic Block Store) de 8 GiB no tipo gp2. <br/>
Para garantir a acessibilidade da aplicação e a administração remota do servidor, foram configuradas regras no Security Group, permitindo o tráfego nas seguintes portas:
<ul>
  <li>Porta 80 (HTTP) – para acesso web à aplicação.</li>
  <li>Porta 22 (SSH) – para gerenciamento remoto seguro da instância.</li>
  <li>Porta 21 (FTP) – para transferência de arquivos.</li>
</ul>

### Chave de acesso a Log de Acessos: <strong>"senha_da_nasa"</strong>.


## As Três Páginas Principais
### Início
![image](https://github.com/user-attachments/assets/bdf94a2c-05b9-45b7-800f-5e4aa451fff3)

### Sobre
![image](https://github.com/user-attachments/assets/d00bf66d-99f4-4c3c-9fe8-8cafee2adb5d)

### Contato
![image](https://github.com/user-attachments/assets/e4cc7987-6e3a-4c45-88ba-789bb5ece6cf)
<br/>
<br/>

## Autenticação
![image](https://github.com/user-attachments/assets/9dbe07ad-6702-4364-83d2-4201382652b5)

### Senha errada (mensagem de erro)
![image](https://github.com/user-attachments/assets/f3c6db00-82f8-4539-89b9-ae03efcb986b)

### Senha correta: (redirecionamento para a página inicial)
![image](https://github.com/user-attachments/assets/1f00b483-d048-4d9c-9915-3f32db03bb1b)
<br/>
<br/>

## Logs de acesso
![image](https://github.com/user-attachments/assets/804fd56b-c343-443d-a8cf-a32cc8637794)

### Excluindo os acessos da página Início
![image](https://github.com/user-attachments/assets/ab8cfca4-1f0a-418e-b31b-bf54b9035c17)

### Acessos Excluídos
![image](https://github.com/user-attachments/assets/4ce93fd0-50f9-4c88-a246-8cb3a9e69ac1)

### Todos os acessos excluídos
![image](https://github.com/user-attachments/assets/6111ba3d-118d-4c72-bbdf-3407fbfefdc5)

### Registros de acesso excluídos
![image](https://github.com/user-attachments/assets/eedb59c3-65c2-49f4-8562-a4e9e16d5b4a)

