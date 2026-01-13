<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Cursos - English At Will</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
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
            z-index: 1000;
        }
        .sidebar-header {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
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
        .menu-item i { margin-right: 10px; font-size: 1.2rem; }
        .main-content { margin-left: 260px; padding: 2rem; }
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
        .btn-add {
            background-color: var(--sidebar-bg);
            color: white;
            border: none;
            padding: 0.5rem 1.2rem;
            border-radius: 8px;
            font-weight: 600;
        }
        .btn-add:hover { background-color: var(--sidebar-hover); color: white; }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h4 class="mb-0">English <span style="color: var(--accent-color)">at Will</span></h4>
            <small class="text-white-50">Painel de Controle</small>
        </div>
        <div class="sidebar-menu mt-3">
            <a href="index.php?url=admin" class="menu-item">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <a href="index.php?url=admin/editHome" class="menu-item">
                <i class="bi bi-house-gear"></i> Editar Home
            </a>
            <a href="index.php?url=admin/posts" class="menu-item">
                <i class="bi bi-journal-text"></i> Blog
            </a>
            <a href="index.php?url=admin/courses" class="menu-item active">
                <i class="bi bi-book"></i> Cursos
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
                <a href="index.php?url=admin/logout" class="btn btn-outline-light btn-sm w-100">Sair</a>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="top-nav">
            <h5 class="mb-0">Gerenciar Cursos</h5>
            <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#courseModal">
                <i class="bi bi-plus-lg"></i> Novo Curso
            </button>
        </div>

        <div class="table-container">
            <?php if (!empty($data['courses'])): ?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Ícone</th>
                                <th>Título</th>
                                <th>Descrição</th>
                                <th class="text-end">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['courses'] as $course): ?>
                                <tr>
                                    <td><div class="bg-light rounded p-2 d-inline-block"><i class="bi <?php echo $course->icon; ?> text-primary"></i></div></td>
                                    <td class="fw-bold"><?php echo htmlspecialchars($course->title); ?></td>
                                    <td class="text-muted"><?php echo substr(htmlspecialchars($course->description), 0, 80) . '...'; ?></td>
                                    <td class="text-end">
                                        <button class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></button>
                                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="text-center py-5">
                    <p class="text-muted">Nenhum curso cadastrado.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Modal simplificado para exemplo -->
    <div class="modal fade" id="courseModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Curso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Título</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descrição</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ícone (Bootstrap Icon)</label>
                            <input type="text" class="form-control" placeholder="bi-book">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Salvar Curso</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
