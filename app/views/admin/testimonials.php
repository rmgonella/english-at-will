<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Depoimentos - English At Will</title>
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
            <a href="index.php?url=admin/testimonials" class="menu-item active">
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
            <h5 class="mb-0">Gerenciar Depoimentos</h5>
            <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="bi bi-plus-lg"></i> Novo Depoimento
            </button>
        </div>

        <?php if(isset($_GET['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Operação realizada com sucesso!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="table-container">
            <?php if (!empty($data['testimonials'])): ?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Aluno</th>
                                <th>Depoimento</th>
                                <th>Avaliação</th>
                                <th class="text-end">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['testimonials'] as $testimonial): ?>
                                <tr>
                                    <td class="fw-bold">
                                        <?php if ($testimonial->image_url): ?>
                                            <img src="<?php echo $testimonial->image_url; ?>" alt="" class="rounded-circle me-2" style="width: 30px; height: 30px; object-fit: cover;">
                                        <?php endif; ?>
                                        <?php echo htmlspecialchars($testimonial->student_name); ?>
                                    </td>
                                    <td class="text-muted"><?php echo substr(htmlspecialchars($testimonial->content), 0, 80) . (strlen($testimonial->content) > 80 ? '...' : ''); ?></td>
                                    <td>
                                        <?php for($i=0; $i<$testimonial->rating; $i++): ?>
                                            <i class="bi bi-star-fill text-warning"></i>
                                        <?php endfor; ?>
                                    </td>
                                    <td class="text-end">
                                        <button class="btn btn-sm btn-outline-primary me-1" 
                                                onclick='editTestimonial(<?php echo json_encode($testimonial); ?>)'>
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <a href="index.php?url=admin/deleteTestimonial/<?php echo $testimonial->id; ?>" 
                                           class="btn btn-sm btn-outline-danger" 
                                           onclick="return confirm('Tem certeza que deseja excluir este depoimento?')">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="text-center py-5">
                    <p class="text-muted">Nenhum depoimento cadastrado.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Modal Adicionar -->
    <div class="modal fade" id="addModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="index.php?url=admin/addTestimonial" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Novo Depoimento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nome do Aluno</label>
                            <input type="text" name="student_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Depoimento</label>
                            <textarea name="content" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Avaliação (1-5 estrelas)</label>
                            <select name="rating" class="form-select">
                                <option value="5">5 Estrelas</option>
                                <option value="4">4 Estrelas</option>
                                <option value="3">3 Estrelas</option>
                                <option value="2">2 Estrelas</option>
                                <option value="1">1 Estrela</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto do Aluno</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <small class="text-muted">Ou insira uma URL abaixo</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">URL da Imagem (Opcional)</label>
                            <input type="text" name="image_url" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Editar -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editForm" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Depoimento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nome do Aluno</label>
                            <input type="text" name="student_name" id="edit_student_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Depoimento</label>
                            <textarea name="content" id="edit_content" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Avaliação (1-5 estrelas)</label>
                            <select name="rating" id="edit_rating" class="form-select">
                                <option value="5">5 Estrelas</option>
                                <option value="4">4 Estrelas</option>
                                <option value="3">3 Estrelas</option>
                                <option value="2">2 Estrelas</option>
                                <option value="1">1 Estrela</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto do Aluno</label>
                            <div id="edit_image_preview" class="mb-2"></div>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <small class="text-muted">Deixe em branco para manter a atual ou insira uma URL abaixo</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">URL da Imagem (Opcional)</label>
                            <input type="text" name="image_url" id="edit_image_url" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function editTestimonial(testimonial) {
            // Configurar a action do formulário
            document.getElementById('editForm').action = 'index.php?url=admin/editTestimonial/' + testimonial.id;
            
            // Preencher os campos
            document.getElementById('edit_student_name').value = testimonial.student_name;
            document.getElementById('edit_content').value = testimonial.content;
            document.getElementById('edit_rating').value = testimonial.rating;
            document.getElementById('edit_image_url').value = testimonial.image_url || '';
            
            // Preview da imagem
            const previewDiv = document.getElementById('edit_image_preview');
            if (testimonial.image_url) {
                previewDiv.innerHTML = `<img src="${testimonial.image_url}" class="img-thumbnail mb-2" style="max-height: 100px;">`;
            } else {
                previewDiv.innerHTML = '';
            }
            
            // Abrir o modal manualmente usando a API do Bootstrap 5
            var editModalEl = document.getElementById('editModal');
            var modal = bootstrap.Modal.getOrCreateInstance(editModalEl);
            modal.show();
        }
    </script>
</body>
</html>
