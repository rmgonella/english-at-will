<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Blog - English At Will</title>
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
        .top-nav {
            background: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 2rem;
            border-radius: 10px;
        }
        .table-container {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
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
        <div class="top-nav">
            <h5 class="mb-0">Gerenciar Blog</h5>
            <div class="d-flex align-items-center">
                <a href="index.php?url=admin/addPost" class="btn btn-primary btn-sm me-2">
                    <i class="bi bi-plus-lg"></i> Nova Postagem
                </a>
                <a href="index.php" target="_blank" class="btn btn-sm btn-light">Ver Site</a>
            </div>
        </div>

        <?php if(isset($_GET['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Operação realizada com sucesso!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Imagem</th>
                            <th>Título</th>
                            <th>Data</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($data['posts'])): ?>
                            <?php foreach($data['posts'] as $post): ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo $post->image_url; ?>" alt="" style="width: 60px; height: 40px; object-fit: cover; border-radius: 4px;">
                                    </td>
                                    <td>
                                        <div class="fw-bold"><?php echo htmlspecialchars($post->title); ?></div>
                                        <small class="text-muted"><?php echo htmlspecialchars($post->slug); ?></small>
                                    </td>
                                    <td><?php echo date('d/m/Y', strtotime($post->created_at)); ?></td>
                                    <td>
                                        <a href="index.php?url=admin/editPost/<?php echo $post->id; ?>" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="index.php?url=admin/deletePost/<?php echo $post->id; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Tem certeza que deseja excluir esta postagem?')">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">Nenhuma postagem encontrada.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
