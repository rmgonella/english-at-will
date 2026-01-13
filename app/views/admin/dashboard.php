<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - English At Will</title>
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
        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border: none;
            transition: transform 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        .icon-blue { background: rgba(0, 33, 71, 0.1); color: var(--sidebar-bg); }
        .icon-orange { background: rgba(243, 156, 18, 0.1); color: var(--accent-color); }
        .icon-green { background: rgba(40, 167, 69, 0.1); color: #28a745; }
        
        .table-container {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        .badge-new { background-color: #e3f2fd; color: #0d6efd; }
        .badge-read { background-color: #f8f9fa; color: #6c757d; }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header text-center">
            <img src="<?php echo URLROOT; ?>/images/logo-admin.png" alt="Logo" class="img-fluid mb-2" style="max-height: 60px; ">
            <div class="small text-white-50">Painel de Controle</div>
        </div>
        <div class="sidebar-menu">
            <a href="index.php?url=admin" class="menu-item active">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <a href="index.php?url=admin/editHome" class="menu-item">
                <i class="bi bi-house-gear"></i> Editar Home
            </a>
            <a href="index.php?url=admin/posts" class="menu-item">
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
            <h5 class="mb-0">Bem-vindo, <strong><?php echo $_SESSION['username'] ?? 'Admin'; ?></strong></h5>
            <div class="d-flex align-items-center">
                <a href="index.php" target="_blank" class="btn btn-sm btn-light me-2">Ver Site</a>
                <div class="dropdown">
                    <img src="https://ui-avatars.com/api/?name=Admin&background=002147&color=fff" class="rounded-circle" width="35" alt="Avatar">
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-icon icon-blue">
                        <i class="bi bi-journal-text"></i>
                    </div>
                    <h3 class="mb-1"><?php echo $data['posts_count'] ?? 0; ?></h3>
                    <p class="text-muted mb-0">Postagens no Blog</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-icon icon-orange">
                        <i class="bi bi-chat-dots"></i>
                    </div>
                    <h3 class="mb-1"><?php echo $data['testimonials_count'] ?? 0; ?></h3>
                    <p class="text-muted mb-0">Depoimentos</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-icon icon-green">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <h3 class="mb-1"><?php echo count($data['contacts'] ?? []); ?></h3>
                    <p class="text-muted mb-0">Mensagens</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(13, 110, 253, 0.1); color: #0d6efd;">
                        <i class="bi bi-eye"></i>
                    </div>
                    <h3 class="mb-1"><?php echo $data['site_views'] ?? 0; ?></h3>
                    <p class="text-muted mb-0">Acessos ao Site</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7">
                <div class="table-container mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Mensagens Recentes</h5>
                        <a href="index.php?url=admin/contacts" class="btn btn-sm btn-outline-primary">Ver Todas</a>
                    </div>
            
            <?php if (!empty($data['contacts'])): ?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Nome</th>
                                <th>WhatsApp</th>
                                <th>Data</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (array_slice($data['contacts'], 0, 5) as $contact): ?>
                                <tr>
                                    <td>
                                        <div class="fw-bold"><?php echo htmlspecialchars($contact->name); ?></div>
                                        <small class="text-muted"><?php echo htmlspecialchars($contact->email); ?></small>
                                    </td>
                                    <td><?php echo htmlspecialchars($contact->whatsapp); ?></td>
                                    <td><?php echo date('d/m/Y', strtotime($contact->created_at)); ?></td>
                                    <td>
                                        <span class="badge <?php echo $contact->status == 'new' ? 'badge-new' : 'badge-read'; ?>">
                                            <?php echo $contact->status == 'new' ? 'Nova' : 'Lida'; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-light"><i class="bi bi-eye"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="text-center py-4">
                    <i class="bi bi-inbox text-muted" style="font-size: 3rem;"></i>
                    <p class="text-muted mt-2">Nenhuma mensagem recebida ainda.</p>
                </div>
            <?php endif; ?>
                </div>
            </div>
            
            <div class="col-lg-5">
                <div class="table-container">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Depoimentos Recentes</h5>
                        <a href="index.php?url=admin/testimonials" class="btn btn-sm btn-outline-primary">Ver Todos</a>
                    </div>
                    
                    <?php if (!empty($data['testimonials'])): ?>
                        <div class="list-group list-group-flush">
                            <?php foreach (array_slice($data['testimonials'], 0, 5) as $testimonial): ?>
                                <div class="list-group-item px-0 py-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <?php if ($testimonial->image_url): ?>
                                            <img src="<?php echo $testimonial->image_url; ?>" class="rounded-circle me-2" width="30" height="30" style="object-fit: cover;">
                                        <?php else: ?>
                                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-2" style="width: 30px; height: 30px;">
                                                <i class="bi bi-person text-muted"></i>
                                            </div>
                                        <?php endif; ?>
                                        <div class="fw-bold"><?php echo htmlspecialchars($testimonial->student_name); ?></div>
                                        <div class="ms-auto text-warning small">
                                            <?php for($i=0; $i<$testimonial->rating; $i++): ?>
                                                <i class="bi bi-star-fill"></i>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                    <p class="text-muted small mb-0">
                                        <?php echo substr(htmlspecialchars($testimonial->content), 0, 100) . (strlen($testimonial->content) > 100 ? '...' : ''); ?>
                                    </p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-4">
                            <p class="text-muted">Nenhum depoimento ainda.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
