<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Home - English At Will</title>
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
        .settings-container {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            max-width: 900px;
        }
        .tab-content {
            padding: 20px;
            border: 1px solid #dee2e6;
            border-top: none;
            border-radius: 0 0 10px 10px;
        }
        .nav-tabs .nav-link {
            font-weight: bold;
            color: #666;
        }
        .nav-tabs .nav-link.active {
            color: var(--sidebar-bg);
        }
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
            <a href="index.php?url=admin/editHome" class="menu-item active">
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
                <a href="index.php?url=admin/logout" class="btn btn-outline-light btn-sm w-100">Sair</a>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="top-nav">
            <h5 class="mb-0">Editar Conteúdo da Página Inicial</h5>
        </div>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Conteúdo atualizado com sucesso!
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="settings-container">
            <ul class="nav nav-tabs" id="langTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pt-tab" data-bs-toggle="tab" data-bs-target="#pt-content" type="button" role="tab">Português (PT)</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="en-tab" data-bs-toggle="tab" data-bs-target="#en-content" type="button" role="tab">Inglês (EN)</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="global-tab" data-bs-toggle="tab" data-bs-target="#global-content" type="button" role="tab">Configurações Globais / Imagens</button>
                </li>
            </ul>

            <div class="tab-content" id="langTabsContent">
                <!-- Conteúdo em Português -->
                <div class="tab-pane fade show active" id="pt-content" role="tabpanel">
                    <form action="index.php?url=admin/updateHome" method="POST">
                        <input type="hidden" name="lang" value="pt">
                        
                        <div class="mb-4">
                            <h6 class="fw-bold text-primary"><i class="bi bi-stars"></i> Seção Hero (Topo) - PT</h6>
                            <div class="mb-3">
                                <label class="form-label">Título Principal</label>
                                <input type="text" name="hero_title" class="form-control" value="<?php echo htmlspecialchars($data['settings']['hero_title'] ?? ''); ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Subtítulo</label>
                                <textarea name="hero_subtitle" class="form-control" rows="3"><?php echo htmlspecialchars($data['settings']['hero_subtitle'] ?? ''); ?></textarea>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary"><i class="bi bi-person"></i> Seção Sobre - PT</h6>
                            <div class="mb-3">
                                <label class="form-label">Texto Sobre o Professor</label>
                                <textarea name="about_text" class="form-control" rows="4"><?php echo htmlspecialchars($data['settings']['about_text'] ?? ''); ?></textarea>
                            </div>
                            <div class="row">
                                <?php for($i=1; $i<=4; $i++): ?>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Destaque <?php echo $i; ?></label>
                                    <input type="text" name="feature_<?php echo $i; ?>" class="form-control" value="<?php echo htmlspecialchars($data['settings']['feature_'.$i] ?? ''); ?>">
                                </div>
                                <?php endfor; ?>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <label class="form-label">Formação Acadêmica (Título)</label>
                                <input type="text" name="academic_title" class="form-control" value="<?php echo htmlspecialchars($data['settings']['academic_title'] ?? ''); ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Formação Acadêmica (Texto)</label>
                                <textarea name="academic_text" class="form-control" rows="3"><?php echo htmlspecialchars($data['settings']['academic_text'] ?? ''); ?></textarea>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <label class="form-label">Pós-Graduação (Título)</label>
                                <input type="text" name="graduate_title" class="form-control" value="<?php echo htmlspecialchars($data['settings']['graduate_title'] ?? ''); ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pós-Graduação (Texto)</label>
                                <textarea name="graduate_text" class="form-control" rows="3"><?php echo htmlspecialchars($data['settings']['graduate_text'] ?? ''); ?></textarea>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <label class="form-label">Certificações Profissionais (Título)</label>
                                <input type="text" name="certifications_title" class="form-control" value="<?php echo htmlspecialchars($data['settings']['certifications_title'] ?? ''); ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Certificações Profissionais (Texto)</label>
                                <textarea name="certifications_text" class="form-control" rows="3"><?php echo htmlspecialchars($data['settings']['certifications_text'] ?? ''); ?></textarea>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <h6 class="fw-bold text-primary"><i class="bi bi-camera-video"></i> Seção Como Funciona - PT</h6>
                            <div class="mb-3">
                                <label class="form-label">Título da Seção</label>
                                <input type="text" name="how_it_works_title" class="form-control" value="<?php echo htmlspecialchars($data['settings']['how_it_works_title'] ?? ''); ?>">
                            </div>
                            <?php for($i=1; $i<=4; $i++): ?>
                            <div class="mb-3">
                                <label class="form-label">Item <?php echo $i; ?></label>
                                <input type="text" name="how_it_works_<?php echo $i; ?>" class="form-control" value="<?php echo htmlspecialchars($data['settings']['how_it_works_'.$i] ?? ''); ?>">
                            </div>
                            <?php endfor; ?>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary"><i class="bi bi-camera-video"></i> Seção Como Funciona - PT</h6>
                            <div class="mb-3">
                                <label class="form-label">Título da Seção</label>
                                <input type="text" name="how_it_works_title" class="form-control" value="<?php echo htmlspecialchars($data['settings']['how_it_works_title'] ?? ''); ?>">
                            </div>
                            <?php for($i=1; $i<=4; $i++): ?>
                            <div class="mb-3">
                                <label class="form-label">Item <?php echo $i; ?></label>
                                <input type="text" name="how_it_works_<?php echo $i; ?>" class="form-control" value="<?php echo htmlspecialchars($data['settings']['how_it_works_'.$i] ?? ''); ?>">
                            </div>
                            <?php endfor; ?>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary"><i class="bi bi-book"></i> Seção Metodologia - PT</h6>
                            <div class="mb-3">
                                <label class="form-label">Título da Seção</label>
                                <input type="text" name="methodology_title" class="form-control" value="<?php echo htmlspecialchars($data['settings']['methodology_title'] ?? ''); ?>">
                            </div>
                            <?php for($i=1; $i<=4; $i++): ?>
                            <div class="card mb-3 bg-light border-0">
                                <div class="card-body">
                                    <label class="form-label fw-bold">Bloco <?php echo $i; ?></label>
                                    <div class="mb-2">
                                        <label class="small">Título</label>
                                        <input type="text" name="methodology_<?php echo $i; ?>_title" class="form-control" value="<?php echo htmlspecialchars($data['settings']['methodology_'.$i.'_title'] ?? ''); ?>">
                                    </div>
                                    <div>
                                        <label class="small">Descrição</label>
                                        <textarea name="methodology_<?php echo $i; ?>_desc" class="form-control" rows="3"><?php echo htmlspecialchars($data['settings']['methodology_'.$i.'_desc'] ?? ''); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <?php endfor; ?>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary"><i class="bi bi-quote"></i> Missão - PT</h6>
                            <div class="mb-3">
                                <label class="form-label">Texto da Missão</label>
                                <textarea name="mission_text" class="form-control" rows="3"><?php echo htmlspecialchars($data['settings']['mission_text'] ?? ''); ?></textarea>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary"><i class="bi bi-people"></i> Seção Para Quem São as Aulas - PT</h6>
                            <div class="mb-3">
                                <label class="form-label">Título da Seção</label>
                                <input type="text" name="audience_title" class="form-control" value="<?php echo htmlspecialchars($data['settings']['audience_title'] ?? ''); ?>">
                            </div>
                            <?php for($i=1; $i<=4; $i++): ?>
                            <div class="card mb-3 bg-light border-0">
                                <div class="card-body">
                                    <label class="form-label fw-bold">Thumb <?php echo $i; ?></label>
                                    <div class="mb-2">
                                        <label class="small">Texto</label>
                                        <input type="text" name="audience_<?php echo $i; ?>_text" class="form-control" value="<?php echo htmlspecialchars($data['settings']['audience_'.$i.'_text'] ?? ''); ?>">
                                    </div>
                                    <div class="mb-2">
                                        <label class="small">Título do Pop-up</label>
                                        <input type="text" name="audience_<?php echo $i; ?>_popup_title" class="form-control" value="<?php echo htmlspecialchars($data['settings']['audience_'.$i.'_popup_title'] ?? ''); ?>">
                                    </div>
                                    <div class="mb-2">
                                        <label class="small">Texto do Pop-up</label>
                                        <textarea name="audience_<?php echo $i; ?>_popup_text" class="form-control" rows="3"><?php echo htmlspecialchars($data['settings']['audience_'.$i.'_popup_text'] ?? ''); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <?php endfor; ?>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Salvar Conteúdo em Português</button>
                    </form>
                </div>

                <!-- Conteúdo em Inglês -->
                <div class="tab-pane fade" id="en-content" role="tabpanel">
                    <form action="index.php?url=admin/updateHome" method="POST">
                        <input type="hidden" name="lang" value="en">
                        
                        <div class="mb-4">
                            <h6 class="fw-bold text-primary"><i class="bi bi-stars"></i> Seção Hero (Topo) - EN</h6>
                            <div class="mb-3">
                                <label class="form-label">Título Principal (EN)</label>
                                <input type="text" name="hero_title_en" class="form-control" value="<?php echo htmlspecialchars($data['settings']['hero_title_en'] ?? ''); ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Subtítulo (EN)</label>
                                <textarea name="hero_subtitle_en" class="form-control" rows="3"><?php echo htmlspecialchars($data['settings']['hero_subtitle_en'] ?? ''); ?></textarea>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary"><i class="bi bi-person"></i> Seção Sobre - EN</h6>
                            <div class="mb-3">
                                <label class="form-label">Texto Sobre o Professor (EN)</label>
                                <textarea name="about_text_en" class="form-control" rows="4"><?php echo htmlspecialchars($data['settings']['about_text_en'] ?? ''); ?></textarea>
                            </div>
                            <div class="row">
                                <?php for($i=1; $i<=4; $i++): ?>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Destaque <?php echo $i; ?> (EN)</label>
                                    <input type="text" name="feature_<?php echo $i; ?>_en" class="form-control" value="<?php echo htmlspecialchars($data['settings']['feature_'.$i.'_en'] ?? ''); ?>">
                                </div>
                                <?php endfor; ?>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <label class="form-label">Formação Acadêmica (Título EN)</label>
                                <input type="text" name="academic_title_en" class="form-control" value="<?php echo htmlspecialchars($data['settings']['academic_title_en'] ?? ''); ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Formação Acadêmica (Texto EN)</label>
                                <textarea name="academic_text_en" class="form-control" rows="3"><?php echo htmlspecialchars($data['settings']['academic_text_en'] ?? ''); ?></textarea>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <label class="form-label">Pós-Graduação (Título EN)</label>
                                <input type="text" name="graduate_title_en" class="form-control" value="<?php echo htmlspecialchars($data['settings']['graduate_title_en'] ?? ''); ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pós-Graduação (Texto EN)</label>
                                <textarea name="graduate_text_en" class="form-control" rows="3"><?php echo htmlspecialchars($data['settings']['graduate_text_en'] ?? ''); ?></textarea>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <label class="form-label">Certificações Profissionais (Título EN)</label>
                                <input type="text" name="certifications_title_en" class="form-control" value="<?php echo htmlspecialchars($data['settings']['certifications_title_en'] ?? ''); ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Certificações Profissionais (Texto EN)</label>
                                <textarea name="certifications_text_en" class="form-control" rows="3"><?php echo htmlspecialchars($data['settings']['certifications_text_en'] ?? ''); ?></textarea>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary"><i class="bi bi-camera-video"></i> Seção Como Funciona - EN</h6>
                            <div class="mb-3">
                                <label class="form-label">Título da Seção (EN)</label>
                                <input type="text" name="how_it_works_title_en" class="form-control" value="<?php echo htmlspecialchars($data['settings']['how_it_works_title_en'] ?? ''); ?>">
                            </div>
                            <?php for($i=1; $i<=4; $i++): ?>
                            <div class="mb-3">
                                <label class="form-label">Item <?php echo $i; ?> (EN)</label>
                                <input type="text" name="how_it_works_<?php echo $i; ?>_en" class="form-control" value="<?php echo htmlspecialchars($data['settings']['how_it_works_'.$i.'_en'] ?? ''); ?>">
                            </div>
                            <?php endfor; ?>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary"><i class="bi bi-book"></i> Seção Metodologia - EN</h6>
                            <div class="mb-3">
                                <label class="form-label">Título da Seção (EN)</label>
                                <input type="text" name="methodology_title_en" class="form-control" value="<?php echo htmlspecialchars($data['settings']['methodology_title_en'] ?? ''); ?>">
                            </div>
                            <?php for($i=1; $i<=4; $i++): ?>
                            <div class="card mb-3 bg-light border-0">
                                <div class="card-body">
                                    <label class="form-label fw-bold">Bloco <?php echo $i; ?> (EN)</label>
                                    <div class="mb-2">
                                        <label class="small">Título (EN)</label>
                                        <input type="text" name="methodology_<?php echo $i; ?>_title_en" class="form-control" value="<?php echo htmlspecialchars($data['settings']['methodology_'.$i.'_title_en'] ?? ''); ?>">
                                    </div>
                                    <div>
                                        <label class="small">Descrição (EN)</label>
                                        <textarea name="methodology_<?php echo $i; ?>_desc_en" class="form-control" rows="3"><?php echo htmlspecialchars($data['settings']['methodology_'.$i.'_desc_en'] ?? ''); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <?php endfor; ?>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary"><i class="bi bi-quote"></i> Missão - EN</h6>
                            <div class="mb-3">
                                <label class="form-label">Texto da Missão (EN)</label>
                                <textarea name="mission_text_en" class="form-control" rows="3"><?php echo htmlspecialchars($data['settings']['mission_text_en'] ?? ''); ?></textarea>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary"><i class="bi bi-people"></i> Seção Para Quem São as Aulas - EN</h6>
                            <div class="mb-3">
                                <label class="form-label">Título da Seção (EN)</label>
                                <input type="text" name="audience_title_en" class="form-control" value="<?php echo htmlspecialchars($data['settings']['audience_title_en'] ?? ''); ?>">
                            </div>
                            <?php for($i=1; $i<=4; $i++): ?>
                            <div class="card mb-3 bg-light border-0">
                                <div class="card-body">
                                    <label class="form-label fw-bold">Thumb <?php echo $i; ?> (EN)</label>
                                    <div class="mb-2">
                                        <label class="small">Texto (EN)</label>
                                        <input type="text" name="audience_<?php echo $i; ?>_text_en" class="form-control" value="<?php echo htmlspecialchars($data['settings']['audience_'.$i.'_text_en'] ?? ''); ?>">
                                    </div>
                                    <div class="mb-2">
                                        <label class="small">Título do Pop-up (EN)</label>
                                        <input type="text" name="audience_<?php echo $i; ?>_popup_title_en" class="form-control" value="<?php echo htmlspecialchars($data['settings']['audience_'.$i.'_popup_title_en'] ?? ''); ?>">
                                    </div>
                                    <div class="mb-2">
                                        <label class="small">Texto do Pop-up (EN)</label>
                                        <textarea name="audience_<?php echo $i; ?>_popup_text_en" class="form-control" rows="3"><?php echo htmlspecialchars($data['settings']['audience_'.$i.'_popup_text_en'] ?? ''); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <?php endfor; ?>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Salvar Conteúdo em Inglês</button>
                    </form>
                </div>

                <!-- Configurações Globais e Imagens -->
                <div class="tab-pane fade" id="global-content" role="tabpanel">
                    <form action="index.php?url=admin/updateHome" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="lang" value="global">
                        
                        <div class="mb-4">
                            <h6 class="fw-bold text-primary"><i class="bi bi-info-circle"></i> Informações de Contato (Globais)</h6>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">WhatsApp (Somente números)</label>
                                    <input type="text" name="whatsapp_number" class="form-control" value="<?php echo htmlspecialchars($data['settings']['whatsapp_number'] ?? ''); ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">E-mail de Contato</label>
                                    <input type="email" name="contact_email" class="form-control" value="<?php echo htmlspecialchars($data['settings']['contact_email'] ?? ''); ?>">
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label">Localização</label>
                                    <input type="text" name="contact_location" class="form-control" value="<?php echo htmlspecialchars($data['settings']['contact_location'] ?? ''); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary"><i class="bi bi-share"></i> Redes Sociais</h6>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Instagram URL</label>
                                    <input type="text" name="social_instagram_url" class="form-control" value="<?php echo htmlspecialchars($data['settings']['social_instagram_url'] ?? ''); ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">TikTok URL</label>
                                    <input type="text" name="social_tiktok_url" class="form-control" value="<?php echo htmlspecialchars($data['settings']['social_tiktok_url'] ?? ''); ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Facebook URL</label>
                                    <input type="text" name="social_facebook_url" class="form-control" value="<?php echo htmlspecialchars($data['settings']['social_facebook_url'] ?? ''); ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">YouTube URL</label>
                                    <input type="text" name="social_youtube_url" class="form-control" value="<?php echo htmlspecialchars($data['settings']['social_youtube_url'] ?? ''); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary"><i class="bi bi-image"></i> Upload de Imagens</h6>
                            <div class="mb-3">
                                <label class="form-label">Imagem "Como Funciona"</label>
                                <input type="file" name="how_it_works_image" class="form-control">
                                <?php if (!empty($data['settings']['how_it_works_image'])): ?>
                                    <div class="mt-2">
                                        <img src="<?php echo URLROOT . '/' . $data['settings']['how_it_works_image']; ?>" alt="Preview" style="max-height: 100px;">
                                    </div>
                                <?php endif; ?>
                            </div>
                            <hr>
                            <div class="row">
                                <?php for($i=1; $i<=4; $i++): ?>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Imagem Público-Alvo <?php echo $i; ?></label>
                                    <input type="file" name="audience_<?php echo $i; ?>_image" class="form-control">
                                    <?php if (!empty($data['settings']['audience_'.$i.'_image'])): ?>
                                        <div class="mt-2">
                                            <img src="<?php echo URLROOT . '/' . $data['settings']['audience_'.$i.'_image']; ?>" alt="Preview" style="max-height: 80px;">
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php endfor; ?>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Salvar Configurações Globais e Imagens</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Manter a aba ativa após o reload
        document.addEventListener('DOMContentLoaded', function() {
            var activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                var tabEl = document.querySelector('#langTabs button[data-bs-target="' + activeTab + '"]');
                if (tabEl) {
                    var tab = new bootstrap.Tab(tabEl);
                    tab.show();
                }
            }

            var tabButtons = document.querySelectorAll('#langTabs button');
            tabButtons.forEach(function(button) {
                button.addEventListener('shown.bs.tab', function(event) {
                    localStorage.setItem('activeTab', event.target.getAttribute('data-bs-target'));
                });
            });
        });
    </script>
</body>
</html>
