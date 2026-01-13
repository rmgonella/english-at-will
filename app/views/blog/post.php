<?php $t = $data['texts']; $post = $data['post']; ?>
<!DOCTYPE html>
<html lang="<?php echo $data['lang'] == 'en' ? 'en' : 'pt-BR'; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['lang'] == 'en' ? ($post->title_en ?: $post->title) : $post->title; ?> - English At Will</title>
    <meta name="description" content="<?php echo substr(strip_tags($data['lang'] == 'en' ? ($post->content_en ?: $post->content) : $post->content), 0, 160); ?>...">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="article">
    <meta property="og:url" content="<?php echo URLROOT; ?>index.php?url=blog/post/<?php echo $post->slug; ?>">
    <meta property="og:title" content="<?php echo $data['lang'] == 'en' ? ($post->title_en ?: $post->title) : $post->title; ?>">
    <meta property="og:description" content="<?php echo substr(strip_tags($data['lang'] == 'en' ? ($post->content_en ?: $post->content) : $post->content), 0, 160); ?>...">
    <meta property="og:image" content="<?php echo $post->image_url ?: URLROOT . '/images/logo.png'; ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/images/favicon.png" type="image/x-icon">
    <style>
        .navbar { background-color: #ffffff !important; position: sticky; top: 0; z-index: 1000; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .post-content { line-height: 1.8; font-size: 1.1rem; }
        .post-header-img { width: 100%; height: 400px; object-fit: cover; border-radius: 15px; margin-bottom: 30px; }
    </style>
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container d-flex justify-content-between align-items-center">
            <span>englishatwill.com.br</span>
            <div class="lang-switcher">
                <a href="?url=blog/post/<?php echo $post->slug; ?>&lang=pt" class="lang-link <?php echo $data['lang'] == 'pt' ? 'active' : ''; ?>">PT</a>
                <span class="text-white-50">|</span>
                <a href="?url=blog/post/<?php echo $post->slug; ?>&lang=en" class="lang-link <?php echo $data['lang'] == 'en' ? 'active' : ''; ?>">EN</a>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg" style="background-color: #ffffff !important;">
        <div class="container">
            <a class="navbar-brand" href="<?php echo URLROOT; ?>">
                <img src="<?php echo URLROOT; ?>/images/logo.png" alt="English At Will" style="height: 50px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>"><?php echo $t['nav_home']; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>#sobre"><?php echo $t['nav_about']; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>#metodologia"><?php echo $t['nav_methodology']; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>#planos"><?php echo $t['nav_plans']; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>#depoimentos"><?php echo $t['nav_testimonials']; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>#contato"><?php echo $t['nav_contact']; ?></a></li>
                    <li class="nav-item"><a class="nav-link active" href="index.php?url=blog">Blog</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php?url=blog">Blog</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Artigo</li>
                        </ol>
                    </nav>
                    
                    <h1 class="mb-3"><?php echo $data['lang'] == 'en' ? ($post->title_en ?: $post->title) : $post->title; ?></h1>
                    <p class="text-muted mb-4">Publicado em <?php echo date('d/m/Y', strtotime($post->created_at)); ?></p>
                    
                    <?php if ($post->image_url): ?>
                        <img src="<?php echo $post->image_url; ?>" class="post-header-img" alt="<?php echo $post->title; ?>">
                    <?php else: ?>
                        <img src="https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?auto=format&fit=crop&w=1200&q=80" class="post-header-img" alt="Blog Post">
                    <?php endif; ?>

                    <div class="post-content">
                        <?php echo nl2br($data['lang'] == 'en' ? ($post->content_en ?: $post->content) : $post->content); ?>
                    </div>

                    <div class="mt-5 pt-4 border-top">
                        <a href="index.php?url=blog" class="btn btn-primary">Voltar ao Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="py-5 bg-dark text-white text-center">
        <div class="container">
            <div class="social-icons mb-4">
                <?php if (!empty($data['settings']['social_instagram'])): ?>
                    <a href="<?php echo $data['settings']['social_instagram']; ?>" class="text-white mx-3 fs-3" target="_blank"><i class="bi bi-instagram"></i></a>
                <?php endif; ?>
                <?php if (!empty($data['settings']['social_facebook'])): ?>
                    <a href="<?php echo $data['settings']['social_facebook']; ?>" class="text-white mx-3 fs-3" target="_blank"><i class="bi bi-facebook"></i></a>
                <?php endif; ?>
                <?php if (!empty($data['settings']['social_youtube'])): ?>
                    <a href="<?php echo $data['settings']['social_youtube']; ?>" class="text-white mx-3 fs-3" target="_blank"><i class="bi bi-youtube"></i></a>
                <?php endif; ?>
                <?php if (!empty($data['settings']['social_linkedin'])): ?>
                    <a href="<?php echo $data['settings']['social_linkedin']; ?>" class="text-white mx-3 fs-3" target="_blank"><i class="bi bi-linkedin"></i></a>
                <?php endif; ?>
            </div>
            <div class="share-icons mb-4">
                <small class="d-block mb-2 text-white-50"><?php echo $data['lang'] == 'pt' ? 'Compartilhe:' : 'Share:'; ?></small>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode('https://englishatwill.com.br'); ?>" target="_blank" class="btn btn-outline-light btn-sm mx-1"><i class="bi bi-facebook"></i></a>
                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode('https://englishatwill.com.br'); ?>" target="_blank" class="btn btn-outline-light btn-sm mx-1"><i class="bi bi-twitter-x"></i></a>
                <a href="https://api.whatsapp.com/send?text=<?php echo urlencode('Confira o blog da English At Will: https://englishatwill.com.br'); ?>" target="_blank" class="btn btn-outline-light btn-sm mx-1"><i class="bi bi-whatsapp"></i></a>
            </div>
            <p class="mb-2">&copy; <?php echo date('Y'); ?> English At Will. <?php echo $t['footer_rights']; ?></p>
            <div class="admin-login-link mt-3">
                <a href="index.php?url=admin/login" class="btn btn-outline-light btn-sm" style="opacity: 0.6; font-size: 0.7rem;">
                    <i class="bi bi-lock-fill"></i> <?php echo $data['lang'] == 'pt' ? 'Área Administrativa' : 'Admin Area'; ?>
                </a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
