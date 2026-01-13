<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensagens de Contato - English At Will</title>
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
        .badge-new { background-color: #e3f2fd; color: #0d6efd; }
        .badge-read { background-color: #f8f9fa; color: #6c757d; }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header text-center">
            <img src="<?php echo URLROOT; ?>/images/logo-admin.png" alt="Logo" class="img-fluid mb-2" style="max-height: 60px; ">
            <div class="small text-white-50">Painel de Controle</div>
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
            <a href="index.php?url=admin/testimonials" class="menu-item">
                <i class="bi bi-chat-dots"></i> Depoimentos
            </a>
            <a href="index.php?url=admin/contacts" class="menu-item active">
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
            <h5 class="mb-0">Mensagens de Contato</h5>
        </div>

        <div class="table-container">
            <?php if (!empty($data['contacts'])): ?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Nome</th>
                                <th>WhatsApp</th>
                                <th>Mensagem</th>
                                <th>Data</th>
                                <th>Status</th>
                                <th class="text-end">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['contacts'] as $contact): ?>
                                <tr class="<?php echo $contact->status == 'new' ? 'table-light fw-bold' : ''; ?>">
                                    <td>
                                        <div><?php echo htmlspecialchars($contact->name); ?></div>
                                        <small class="text-muted fw-normal"><?php echo htmlspecialchars($contact->email); ?></small>
                                    </td>
                                    <td><?php echo htmlspecialchars($contact->whatsapp); ?></td>
                                    <td><small class="fw-normal"><?php echo substr(htmlspecialchars($contact->message), 0, 50) . (strlen($contact->message) > 50 ? '...' : ''); ?></small></td>
                                    <td><?php echo date('d/m/Y H:i', strtotime($contact->created_at)); ?></td>
                                    <td>
                                        <span class="badge <?php echo $contact->status == 'new' ? 'badge-new' : 'badge-read'; ?>">
                                            <?php echo $contact->status == 'new' ? 'Nova' : 'Lida'; ?>
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <button class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="modal" data-bs-target="#viewModal<?php echo $contact->id; ?>" title="Visualizar">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <a href="index.php?url=admin/deleteContact/<?php echo $contact->id; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Tem certeza que deseja excluir esta mensagem?')" title="Excluir">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Modal de Visualização -->
                                <div class="modal fade" id="viewModal<?php echo $contact->id; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Mensagem de <?php echo htmlspecialchars($contact->name); ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Data:</strong> <?php echo date('d/m/Y H:i', strtotime($contact->created_at)); ?></p>
                                                <p><strong>E-mail:</strong> <?php echo htmlspecialchars($contact->email); ?></p>
                                                <p><strong>WhatsApp:</strong> <?php echo htmlspecialchars($contact->whatsapp); ?></p>
                                                <hr>
                                                <p><strong>Mensagem:</strong></p>
                                                <p class="bg-light p-3 rounded"><?php echo nl2br(htmlspecialchars($contact->message)); ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <?php if($contact->status == 'new'): ?>
                                                    <a href="index.php?url=admin/markContactRead/<?php echo $contact->id; ?>" class="btn btn-success">Marcar como Lida</a>
                                                <?php endif; ?>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="text-center py-5">
                    <p class="text-muted">Nenhuma mensagem recebida.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
