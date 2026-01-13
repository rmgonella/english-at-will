<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Postagem - English At Will</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/images/favicon.png" type="image/x-icon">
    <style>
        :root {
            --sidebar-bg: #002147;
            --sidebar-hover: #003366;
            --accent-color: #f39c12;
            --content-bg: #f8f9fa;
        }
        body {
            background-color: var(--content-bg);
            font-family: 'Inter', sans-serif;
        }
        .sidebar {
            width: 260px;
            background-color: var(--sidebar-bg);
            min-height: 100vh;
            position: fixed;
            color: white;
            transition: all 0.3s;
            z-index: 1000;
        }
        .sidebar-header {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .sidebar-menu {
            padding: 1rem 0;
        }
        .menu-item {
            padding: 0.8rem 1.5rem;
            display: flex;
            align-items: center;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: all 0.3s;
            border-left: 4px solid transparent;
        }
        .menu-item:hover, .menu-item.active {
            background-color: var(--sidebar-hover);
            color: white;
            border-left-color: var(--accent-color);
        }
        .menu-item i {
            margin-right: 10px;
            font-size: 1.2rem;
        }
        .main-content {
            margin-left: 260px;
            padding: 2rem;
        }
        .form-container {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header text-center">
            <img src="<?php echo URLROOT; ?>/images/logo-admin.png" alt="Logo" class="img-fluid mb-2" style="max-height: 60px;">
            <div class="small text-white-50">Painel de Controle</div>
        </div>
        <div class="sidebar-menu">
            <a href="<?php echo URLROOT; ?>" class="menu-item">
                <i class="bi bi-house"></i> Ver Site
            </a>
            <a href="index.php?url=admin" class="menu-item">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <a href="index.php?url=admin/editHome" class="menu-item">
                <i class="bi bi-house-gear"></i> Editar Home
            </a>
            <a href="index.php?url=admin/posts" class="menu-item active">
                <i class="bi bi-journal-text"></i> Blog
            </a>
            <a href="index.php?url=admin/testimonials" class="menu-item">
                <i class="bi bi-chat-dots"></i> Depoimentos
            </a>
            <a href="index.php?url=admin/contacts" class="menu-item">
                <i class="bi bi-envelope"></i> Mensagens
            </a>
            <a href="index.php?url=admin/settings" class="menu-item">
                <i class="bi bi-gear"></i> Configurações
            </a>
            <div class="mt-5 px-3">
                <a href="index.php?url=admin/logout" class="btn btn-outline-light btn-sm w-100">
                    <i class="bi bi-box-arrow-right"></i> Sair
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="mb-0">Nova Postagem</h5>
            <a href="index.php?url=admin/posts" class="btn btn-sm btn-outline-secondary">Voltar</a>
        </div>

        <div class="form-container">
            <form action="index.php?url=admin/addPost" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Título (PT)</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Título (EN)</label>
                        <input type="text" name="title_en" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Imagem da Postagem</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    <small class="text-muted">Ou insira uma URL abaixo</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">URL da Imagem (Opcional)</label>
                    <input type="text" name="image_url" class="form-control" placeholder="https://exemplo.com/imagem.jpg">
                </div>

                <div class="mb-3">
                    <label class="form-label">Conteúdo (PT)</label>
                    <textarea name="content" class="form-control" rows="10" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Conteúdo (EN)</label>
                    <textarea name="content_en" class="form-control" rows="10" required></textarea>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Salvar Postagem</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
