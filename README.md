# 📋 TO DO LIST - LARAVEL

Sistema de gerenciamento de tarefas (To-Do List) desenvolvido com Laravel 12.

## 📦 Requisitos## Code of Conduct

- PHP 8.2 ou superiorIn order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

- Composer

- Node.js 18+ e NPM## License

- SQLite (já incluído no PHP)

---

## Instalação

### 1. Clone o repositório

```bash
git clone <url-do-repositorio>
cd to-do-list
```

### 2. Instale as dependências do PHP

```bash
composer install
```

### 3. Instale as dependências do Node

```bash
npm install
```

### 4. Configure o ambiente

```bash
# Copie o arquivo de exemplo
cp .env.example .env

# Gere a chave da aplicação
php artisan key:generate
```

### 5. Configure o banco de dados

O projeto já está configurado para usar SQLite. O arquivo `.env` deve conter:

```env
DB_CONNECTION=sqlite
```

O arquivo do banco já existe em `database/database.sqlite`

### 6. Execute as migrations

```bash
php artisan migrate
```

### 7. Compile os assets

```bash
npm run build
```

---

## Como Rodar

### Servidor de Desenvolvimento

```bash
php artisan serve
```

A aplicação estará disponível em: `http://127.0.0.1:8000`

---

## Como Usar

### 1. Criar uma conta

- Acesse `http://127.0.0.1:8000`
- Clique em "Criar conta"
- Preencha: nome, e-mail e senha
- Clique em "Criar Conta"

### 2. Fazer login

- Acesse `http://127.0.0.1:8000/login`
- Preencha e-mail e senha
- Clique em "Entrar"

### 3. Gerenciar tarefas

- Crie novas tarefas com título e descrição
- Marque como "Pendente" ou "Concluída"
- Edite ou exclua tarefas existentes
- Filtre por status
- Navegue pela lista

---

## Decisões

### **Por que Enum (StatusTarefa)?**

- Type safety nativa do PHP 8.2
- Métodos auxiliares (`label()`, `badge()`)

### **Por que FormRequests?**

- Separação de responsabilidades
- Validações reutilizáveis e testáveis
- Controllers mais limpos e focados

### **Por que SQLite?**

- Zero configuração
- Portabilidade total
- Ideal para desenvolvimento e demonstração

---

## Melhorias Futuras

- [ ] **Políticas (Policies)** - Melhor autorização com Laravel Policies
- [ ] **Ordenação** - Permitir ordenar por data, título ou status
- [ ] **Busca** - Campo de busca por título
- [ ] **Categorias** - Organizar tarefas em categorias/projetos
- [ ] **Prioridades** - Adicionar níveis de prioridade (alta, média, baixa)
- [ ] **Data de Vencimento** - Prazos e alertas de tarefas vencidas
- [ ] **Notificações** - E-mails de lembrete
- [ ] **Compartilhamento** - Permitir compartilhar tarefas com outros usuários
- [ ] **Anexos** - Upload de arquivos nas tarefas

---

**Tecnologias:** Laravel 12, PHP 8.2, SQLite, Blade, Fortify, PHPUnit

---
