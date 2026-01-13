<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações - English At Will</title>
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
            max-width: 800px;
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
            <a href="index.php?url=admin/settings" class="menu-item active">
                <i class="bi bi-gear"></i> Configurações
            </a>
            <div class="mt-5 px-3">
                <a href="index.php?url=admin/logout" class="btn btn-outline-light btn-sm w-100">Sair</a>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="top-nav">
            <h5 class="mb-0">Configurações do Site</h5>
        </div>

        <div class="settings-container">
            <form action="index.php?url=admin/updateSettings" method="POST">
                <div class="mb-3">
                    <label class="form-label">Título do Site</label>
                    <input type="text" name="site_title" class="form-control" value="<?php echo htmlspecialchars($data['settings']['site_title'] ?? ''); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">WhatsApp (com DDD)</label>
                    <input type="text" name="whatsapp_number" class="form-control" value="<?php echo htmlspecialchars($data['settings']['whatsapp_number'] ?? ''); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">E-mail de Contato</label>
                    <input type="email" name="contact_email" class="form-control" value="<?php echo htmlspecialchars($data['settings']['contact_email'] ?? 'wilson@englishatwill.com.br'); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Localização</label>
                    <input type="text" name="contact_location" class="form-control" value="<?php echo htmlspecialchars($data['settings']['contact_location'] ?? 'Presidente Prudente - SP (Atendimento Online)'); ?>">
                </div>
                <hr class="my-4">
                <h6>Redes Sociais</h6>
                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-instagram me-2"></i>Instagram (URL completa)</label>
                    <input type="text" name="social_instagram" class="form-control" value="<?php echo htmlspecialchars($data['settings']['social_instagram'] ?? ''); ?>" placeholder="https://instagram.com/seu-perfil">
                </div>
                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-facebook me-2"></i>Facebook (URL completa)</label>
                    <input type="text" name="social_facebook" class="form-control" value="<?php echo htmlspecialchars($data['settings']['social_facebook'] ?? ''); ?>" placeholder="https://facebook.com/seu-perfil">
                </div>
                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-youtube me-2"></i>YouTube (URL completa)</label>
                    <input type="text" name="social_youtube" class="form-control" value="<?php echo htmlspecialchars($data['settings']['social_youtube'] ?? ''); ?>" placeholder="https://youtube.com/seu-canal">
                </div>
                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-linkedin me-2"></i>LinkedIn (URL completa)</label>
                    <input type="text" name="social_linkedin" class="form-control" value="<?php echo htmlspecialchars($data['settings']['social_linkedin'] ?? ''); ?>" placeholder="https://linkedin.com/in/seu-perfil">
                </div>
                <hr class="my-4">
                <h6>Conteúdo da Home (Português)</h6>
                <div class="mb-3">
                    <label class="form-label">Título Principal (Hero) - PT</label>
                    <input type="text" name="hero_title" class="form-control" value="<?php echo htmlspecialchars($data['settings']['hero_title'] ?? ''); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Subtítulo (Hero) - PT</label>
                    <textarea name="hero_subtitle" class="form-control" rows="3"><?php echo htmlspecialchars($data['settings']['hero_subtitle'] ?? ''); ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Texto Sobre - PT</label>
                    <textarea name="about_text" class="form-control" rows="4"><?php echo htmlspecialchars($data['settings']['about_text'] ?? ''); ?></textarea>
                </div>

                <hr class="my-4">
                <h6>Conteúdo da Home (Inglês)</h6>
                <div class="mb-3">
                    <label class="form-label">Título Principal (Hero) - EN</label>
                    <input type="text" name="hero_title_en" class="form-control" value="<?php echo htmlspecialchars($data['settings']['hero_title_en'] ?? ''); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Subtítulo (Hero) - EN</label>
                    <textarea name="hero_subtitle_en" class="form-control" rows="3"><?php echo htmlspecialchars($data['settings']['hero_subtitle_en'] ?? ''); ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Texto Sobre - EN</label>
                    <textarea name="about_text_en" class="form-control" rows="4"><?php echo htmlspecialchars($data['settings']['about_text_en'] ?? ''); ?></textarea>
                </div>

                <hr class="my-4">
                <h6>Seção: Para Quem São as Aulas (Pop-ups)</h6>
                <div class="mb-3">
                    <label class="form-label">Título da Seção</label>
                    <input type="text" name="audience_title" class="form-control" value="<?php echo htmlspecialchars($data['settings']['audience_title'] ?? 'Para Quem São as Aulas'); ?>">
                </div>
                <?php 
                $audiences = [
                    1 => 'Crianças & Teens',
                    2 => 'Vestibular & ENEM',
                    3 => 'Adultos & Profissionais',
                    4 => 'Conversação & Viagem'
                ];
                foreach($audiences as $i => $default_label): 
                ?>
                <div class="card mb-3 p-3 bg-light border-0">
                    <div class="mb-2">
                        <label class="form-label fw-bold">Audiência <?php echo $i; ?> - Título</label>
                        <input type="text" name="audience_<?php echo $i; ?>" class="form-control" value="<?php echo htmlspecialchars($data['settings']['audience_'.$i] ?? $default_label); ?>">
                    </div>
                    <div>
                        <label class="form-label fw-bold">Audiência <?php echo $i; ?> - Texto do Pop-up</label>
                        <textarea name="audience_<?php echo $i; ?>_desc" class="form-control" rows="3"><?php echo htmlspecialchars($data['settings']['audience_'.$i.'_desc'] ?? ''); ?></textarea>
                    </div>
                </div>
                <?php endforeach; ?>

                <hr class="my-4">
                <h6>Seção: O CURSO DE INGLÊS DA ENGLISH AT WILL</h6>
                <div class="mb-3">
                    <label class="form-label">Título da Seção</label>
                    <input type="text" name="methodology_title" class="form-control" value="<?php echo htmlspecialchars($data['settings']['methodology_title'] ?? 'O CURSO DE INGLÊS DA ENGLISH AT WILL'); ?>">
                </div>
                <?php 
                for($i=1; $i<=4; $i++): 
                ?>
                <div class="card mb-3 p-3 bg-light border-0">
                    <div class="mb-2">
                        <label class="form-label fw-bold">Item <?php echo $i; ?> - Título</label>
                        <input type="text" name="methodology_<?php echo $i; ?>_title" class="form-control" value="<?php echo htmlspecialchars($data['settings']['methodology_'.$i.'_title'] ?? ''); ?>">
                    </div>
                    <div>
                        <label class="form-label fw-bold">Item <?php echo $i; ?> - Descrição</label>
                        <textarea name="methodology_<?php echo $i; ?>_desc" class="form-control" rows="3"><?php echo htmlspecialchars($data['settings']['methodology_'.$i.'_desc'] ?? ''); ?></textarea>
                    </div>
                </div>
                <?php endfor; ?>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary px-4">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
