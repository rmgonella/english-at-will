<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrativo - English At Will</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/images/favicon.png" type="image/x-icon">
    <style>
        :root {
            --admin-primary: #002147;
            --admin-accent: #f39c12;
        }
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .login-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 100%;
            max-width: 400px;
            padding: 2.5rem;
        }
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .login-header i {
            font-size: 3rem;
            color: var(--admin-primary);
        }
        .login-header h2 {
            color: var(--admin-primary);
            font-weight: 700;
            margin-top: 1rem;
        }
        .btn-admin {
            background-color: var(--admin-primary);
            color: white;
            border: none;
            padding: 0.8rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-admin:hover {
            background-color: #003366;
            color: white;
            transform: translateY(-2px);
        }
        .form-control:focus {
            border-color: var(--admin-primary);
            box-shadow: 0 0 0 0.25rem rgba(0, 33, 71, 0.1);
        }
        .alert-custom {
            border-radius: 10px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-header">
            <img src="<?php echo URLROOT; ?>/images/logo-admin.png" alt="English At Will" class="img-fluid mb-3" style="max-height: 80px;">
            <h2>Área Restrita</h2>
            <p class="text-muted">Painel Administrativo</p>
        </div>

        <?php if (isset($data['error'])): ?>
            <div class="alert alert-danger alert-custom mb-4">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> <?php echo $data['error']; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="index.php?url=admin/login">
            <div class="mb-3">
                <label for="username" class="form-label">Usuário</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control border-start-0 bg-light" id="username" name="username" required autofocus>
                </div>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Senha</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control border-start-0 bg-light" id="password" name="password" required>
                </div>
            </div>
            <button type="submit" class="btn btn-admin w-100 mb-3">Entrar no Painel</button>
            <div class="text-center">
                <a href="<?php echo URLROOT; ?>" class="text-decoration-none text-muted small"><i class="bi bi-arrow-left"></i> Voltar ao site</a>
            </div>
        </form>
    </div>
</body>
</html>
