<?php $t = $data['texts']; ?>
<!DOCTYPE html>
<html lang="<?php echo $data['lang'] == 'en' ? 'en' : 'pt-BR'; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title']; ?></title>
    <meta name="description" content="<?php echo $data['lang'] == 'pt' ? 'Aprenda inglês de forma natural e definitiva com o Professor Wilson. Aulas personalizadas e online para todas as idades.' : 'Learn English naturally and definitively with Professor Wilson. Personalized online classes for all ages.'; ?>">
    <meta name="keywords" content="inglês, aprender inglês, aulas de inglês online, professor de inglês, english at will, curso de inglês">
    <meta name="author" content="English At Will">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo URLROOT; ?>">
    <meta property="og:title" content="<?php echo $data['title']; ?>">
    <meta property="og:description" content="<?php echo $data['lang'] == 'pt' ? 'Aprenda inglês de forma natural e definitiva com o Professor Wilson.' : 'Learn English naturally and definitively with Professor Wilson.'; ?>">
    <meta property="og:image" content="<?php echo URLROOT; ?>/images/logo.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo URLROOT; ?>">
    <meta property="twitter:title" content="<?php echo $data['title']; ?>">
    <meta property="twitter:description" content="<?php echo $data['lang'] == 'pt' ? 'Aprenda inglês de forma natural e definitiva com o Professor Wilson.' : 'Learn English naturally and definitively with Professor Wilson.'; ?>">
    <meta property="twitter:image" content="<?php echo URLROOT; ?>/images/logo.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/images/favicon.png" type="image/x-icon">
    <style>
        .lang-switcher {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        .lang-link {
            color: #ffffff !important;
            text-decoration: none;
            font-size: 0.85rem;
            opacity: 0.7;
            transition: opacity 0.3s;
            font-weight: 500;
        }
        .lang-link:hover, .lang-link.active {
            opacity: 1;
            font-weight: 700;
        }
        .mission-section {
            background-color: var(--primary-blue);
            color: white;
            padding: 60px 0;
            text-align: center;
        }
        .mission-text {
            font-size: 1.25rem;
            font-style: italic;
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container d-flex justify-content-between align-items-center">
            <span>englishatwill.com.br</span>
            <div class="lang-switcher">
                <a href="?lang=pt" class="lang-link <?php echo $data['lang'] == 'pt' ? 'active' : ''; ?>">PT</a>
                <span class="text-white-50">|</span>
                <a href="?lang=en" class="lang-link <?php echo $data['lang'] == 'en' ? 'active' : ''; ?>">EN</a>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg" style="background-color: #ffffff !important;">
        <div class="container">
            <a class="navbar-brand" href="<?php echo URLROOT; ?>">
                <img src="<?php echo URLROOT; ?>/images/logo.png" alt="English At Will" style="height: 89px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>"><?php echo $t['nav_home']; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#sobre"><?php echo $t['nav_about']; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#metodologia"><?php echo $t['nav_methodology']; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#planos"><?php echo $t['nav_plans']; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#depoimentos"><?php echo $t['nav_testimonials']; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#contato"><?php echo $t['nav_contact']; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?url=blog">Blog</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1><?php 
                        $hero_title = ($data['lang'] == 'pt') 
                            ? (!empty($data['settings']['hero_title']) ? $data['settings']['hero_title'] : $t['hero_title']) 
                            : (!empty($data['settings']['hero_title_en']) ? $data['settings']['hero_title_en'] : $t['hero_title']);
                        echo $hero_title; 
                    ?></h1>
                    <p><?php 
                        $hero_subtitle = ($data['lang'] == 'pt') 
                            ? (!empty($data['settings']['hero_subtitle']) ? $data['settings']['hero_subtitle'] : $t['hero_subtitle']) 
                            : (!empty($data['settings']['hero_subtitle_en']) ? $data['settings']['hero_subtitle_en'] : $t['hero_subtitle']);
                        echo $hero_subtitle; 
                    ?></p>
                    <div class="mt-4">
                        <a href="https://api.whatsapp.com/send?phone=<?php echo preg_replace('/[^0-9]/', '', $data['settings']['whatsapp_number'] ?? '5518997254444'); ?>" class="btn-green" target="_blank"><?php echo $t['btn_trial']; ?></a>
                        <a href="https://api.whatsapp.com/send?phone=<?php echo preg_replace('/[^0-9]/', '', $data['settings']['whatsapp_number'] ?? '5518997254444'); ?>" class="btn-outline-blue" target="_blank"><?php echo $t['btn_plans']; ?></a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="<?php echo URLROOT; ?>/images/hero-professor.png" alt="Professor Wilson" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Quem é o Professor -->
    <section class="professor-section py-5" id="sobre">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 mb-4 mb-lg-0">
                <img src="<?php echo URLROOT; ?>/images/about-professor.png" alt="Professor Wilson" class="img-fluid rounded shadow">
            </div>
            <div class="col-lg-8">
                <h2><?php echo $t['about_title']; ?></h2>
                <p><?php 
                    $about_text = ($data['lang'] == 'pt') 
                        ? (!empty($data['settings']['about_text']) ? $data['settings']['about_text'] : $t['about_text']) 
                        : (!empty($data['settings']['about_text_en']) ? $data['settings']['about_text_en'] : $t['about_text']);
                    echo $about_text; 
                ?></p>
                <ul class="professor-features">
                    <?php for($i=1; $i<=4; $i++): ?>
                    <li><?php 
                        $feat_key = "feature_{$i}";
                        $feat_key_en = "feature_{$i}_en";
                        echo ($data['lang'] == 'pt') 
                            ? (!empty($data['settings'][$feat_key]) ? $data['settings'][$feat_key] : $t['feature_'.$i]) 
                            : (!empty($data['settings'][$feat_key_en]) ? $data['settings'][$feat_key_en] : $t['feature_'.$i]); 
                    ?></li>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>
        <div class="row mt-5 g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4">
                    <h4><?php 
                        echo ($data['lang'] == 'pt') 
                            ? (!empty($data['settings']['academic_title']) ? $data['settings']['academic_title'] : $t['academic_title']) 
                            : (!empty($data['settings']['academic_title_en']) ? $data['settings']['academic_title_en'] : $t['academic_title']); 
                    ?></h4>
                    <p><?php 
                        echo ($data['lang'] == 'pt') 
                            ? (!empty($data['settings']['academic_text']) ? $data['settings']['academic_text'] : $t['academic_text']) 
                            : (!empty($data['settings']['academic_text_en']) ? $data['settings']['academic_text_en'] : $t['academic_text']); 
                    ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4">
                    <h4><?php 
                        echo ($data['lang'] == 'pt') 
                            ? (!empty($data['settings']['graduate_title']) ? $data['settings']['graduate_title'] : $t['graduate_title']) 
                            : (!empty($data['settings']['graduate_title_en']) ? $data['settings']['graduate_title_en'] : $t['graduate_title']); 
                    ?></h4>
                    <p><?php 
                        echo ($data['lang'] == 'pt') 
                            ? (!empty($data['settings']['graduate_text']) ? $data['settings']['graduate_text'] : $t['graduate_text']) 
                            : (!empty($data['settings']['graduate_text_en']) ? $data['settings']['graduate_text_en'] : $t['graduate_text']); 
                    ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4">
                    <h4><?php 
                        echo ($data['lang'] == 'pt') 
                            ? (!empty($data['settings']['certifications_title']) ? $data['settings']['certifications_title'] : $t['certifications_title']) 
                            : (!empty($data['settings']['certifications_title_en']) ? $data['settings']['certifications_title_en'] : $t['certifications_title']); 
                    ?></h4>
                    <p><?php 
                        echo ($data['lang'] == 'pt') 
                            ? (!empty($data['settings']['certifications_text']) ? $data['settings']['certifications_text'] : $t['certifications_text']) 
                            : (!empty($data['settings']['certifications_text_en']) ? $data['settings']['certifications_text_en'] : $t['certifications_text']); 
                    ?></p>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Metodologia -->
    <section class="methodology-section" id="metodologia">
        <div class="container">
            <h2 class="section-title-blue"><?php 
                $methodology_title = ($data['lang'] == 'pt') 
                    ? (!empty($data['settings']['methodology_title']) ? $data['settings']['methodology_title'] : $t['methodology_title']) 
                    : (!empty($data['settings']['methodology_title_en']) ? $data['settings']['methodology_title_en'] : $t['methodology_title']);
                echo $methodology_title; 
            ?></h2>
            <div class="row g-4">
                <?php for($i=1; $i<=4; $i++): ?>
                <div class="col-md-6">
                    <div class="methodology-card">
                        <div class="methodology-icon">
                            <i class="bi bi-check2-circle"></i>
                        </div>
                        <div>
                            <h4><?php 
                                $m_title_key = "methodology_{$i}_title";
                                $m_title_key_en = "methodology_{$i}_title_en";
                                echo ($data['lang'] == 'pt') 
                                    ? (!empty($data['settings'][$m_title_key]) ? $data['settings'][$m_title_key] : $t['methodology_'.$i.'_title']) 
                                    : (!empty($data['settings'][$m_title_key_en]) ? $data['settings'][$m_title_key_en] : $t['methodology_'.$i.'_title']); 
                            ?></h4>
                            <p><?php 
                                $m_desc_key = "methodology_{$i}_desc";
                                $m_desc_key_en = "methodology_{$i}_desc_en";
                                echo ($data['lang'] == 'pt') 
                                    ? (!empty($data['settings'][$m_desc_key]) ? $data['settings'][$m_desc_key] : $t['methodology_'.$i.'_desc']) 
                                    : (!empty($data['settings'][$m_desc_key_en]) ? $data['settings'][$m_desc_key_en] : $t['methodology_'.$i.'_desc']); 
                            ?></p>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </div>
    </section>

    <!-- Missão -->
    <section class="mission-section">
        <div class="container">
            <p class="mission-text">"<?php 
                $mission_text = ($data['lang'] == 'pt') 
                    ? (!empty($data['settings']['mission_text']) ? $data['settings']['mission_text'] : $t['mission_text']) 
                    : (!empty($data['settings']['mission_text_en']) ? $data['settings']['mission_text_en'] : $t['mission_text']);
                echo $mission_text; 
            ?>"</p>
        </div>
    </section>

    <!-- Social Media Section -->
    <section style="padding: 80px 0; background-color: #ffffff; font-family: 'Inter', sans-serif;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div style="text-align: left;">
                        <div style="margin-bottom: 15px;">
                            <img src="https://fonts.gstatic.com/s/e/notoemoji/latest/1f44d/512.webp" alt="👍" width="80" height="80">
                        </div>
                        <h2 style="color: #2D2471; font-weight: 800; font-size: 2.8rem; line-height: 1.1; margin: 0;"><?php 
                            $social_title = ($data['lang'] == 'pt') 
                                ? (!empty($data['settings']['social_title']) ? $data['settings']['social_title'] : 'Siga-me nas<br>redes sociais') 
                                : (!empty($data['settings']['social_title_en']) ? $data['settings']['social_title_en'] : 'Follow me on<br>social media');
                            echo $social_title; 
                        ?></h2>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <a href="<?php echo $data['settings']['social_tiktok_url'] ?? '#'; ?>" target="_blank" style="text-decoration: none !important; display: block;">
                                <div style="background-color: #1A1A1A; border-radius: 15px; padding: 35px 20px; color: #ffffff; text-align: center; min-height: 200px; display: flex; flex-direction: column; align-items: center; justify-content: center; transition: transform 0.3s ease;">
                                    <i class="bi bi-tiktok" style="font-size: 3.5rem; margin-bottom: 15px; color: #ffffff; display: block;"></i>
                                    <div style="width: 100%;">
                                        <p style="font-size: 1.8rem; font-weight: 700; margin-bottom: 0; line-height: 1.2; color: #ffffff;"><?php echo $data['settings']['social_tiktok_count'] ?? '130,03K'; ?></p>
                                        <p style="font-size: 1rem; font-weight: 400; margin: 0; color: #ffffff; opacity: 0.9;"><?php echo $data['settings']['social_tiktok_label'] ?? 'Seguidores'; ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="<?php echo $data['settings']['social_instagram_url'] ?? '#'; ?>" target="_blank" style="text-decoration: none !important; display: block;">
                                <div style="background-color: #FF3D77; border-radius: 15px; padding: 35px 20px; color: #ffffff; text-align: center; min-height: 200px; display: flex; flex-direction: column; align-items: center; justify-content: center; transition: transform 0.3s ease;">
                                    <i class="bi bi-instagram" style="font-size: 3.5rem; margin-bottom: 15px; color: #ffffff; display: block;"></i>
                                    <div style="width: 100%;">
                                        <p style="font-size: 1.8rem; font-weight: 700; margin-bottom: 0; line-height: 1.2; color: #ffffff;"><?php echo $data['settings']['social_instagram_count'] ?? '900K'; ?></p>
                                        <p style="font-size: 1rem; font-weight: 400; margin: 0; color: #ffffff; opacity: 0.9;"><?php echo $data['settings']['social_instagram_label'] ?? 'Seguidores'; ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="<?php echo $data['settings']['social_youtube_url'] ?? '#'; ?>" target="_blank" style="text-decoration: none !important; display: block;">
                                <div style="background-color: #D32424; border-radius: 15px; padding: 35px 20px; color: #ffffff; text-align: center; min-height: 200px; display: flex; flex-direction: column; align-items: center; justify-content: center; transition: transform 0.3s ease;">
                                    <i class="bi bi-youtube" style="font-size: 3.5rem; margin-bottom: 15px; color: #ffffff; display: block;"></i>
                                    <div style="width: 100%;">
                                        <p style="font-size: 1.8rem; font-weight: 700; margin-bottom: 0; line-height: 1.2; color: #ffffff;"><?php echo $data['settings']['social_youtube_count'] ?? '2.53M'; ?></p>
                                        <p style="font-size: 1rem; font-weight: 400; margin: 0; color: #ffffff; opacity: 0.9;"><?php echo $data['settings']['social_youtube_label'] ?? 'Inscritos'; ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Para Quem São as Aulas -->
    <section class="py-5 bg-white">
        <div class="container">
            <h2 class="section-title-blue"><?php 
                $audience_title = ($data['lang'] == 'pt') 
                    ? (!empty($data['settings']['audience_title']) ? $data['settings']['audience_title'] : $t['audience_title']) 
                    : (!empty($data['settings']['audience_title_en']) ? $data['settings']['audience_title_en'] : $t['audience_title']);
                echo $audience_title; 
            ?></h2>
            <div class="row">
                <?php for($i=1; $i<=4; $i++): 
                    $text_key = "audience_{$i}_text";
                    $text_key_en = "audience_{$i}_text_en";
                    $image_key = "audience_{$i}_image";
                    
                    $text_val = ($data['lang'] == 'pt')
                        ? (!empty($data['settings'][$text_key]) ? $data['settings'][$text_key] : $t['audience_'.$i])
                        : (!empty($data['settings'][$text_key_en]) ? $data['settings'][$text_key_en] : $t['audience_'.$i]);
                    
                    $image_val = !empty($data['settings'][$image_key]) 
                        ? URLROOT . '/' . $data['settings'][$image_key] 
                        : URLROOT . '/images/audience-' . ($i==1 ? 'kids' : ($i==2 ? 'teens' : ($i==3 ? 'adults' : 'travel'))) . '.png';
                ?>
                <div class="col-md-3">
                    <div class="audience-card" data-bs-toggle="modal" data-bs-target="#audienceModal<?php echo $i; ?>">
                        <img src="<?php echo $image_val; ?>" alt="<?php echo $text_val; ?>">
                        <div class="audience-label"><?php echo $text_val; ?></div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="audienceModal<?php echo $i; ?>" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <h5 class="modal-title fw-bold"><?php 
                                    $pop_title_key = "audience_{$i}_popup_title" . ($data['lang'] == 'en' ? '_en' : '');
                                    echo !empty($data['settings'][$pop_title_key]) ? $data['settings'][$pop_title_key] : $text_val; 
                                ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p><?php 
                                    $pop_text_key = "audience_{$i}_popup_text" . ($data['lang'] == 'en' ? '_en' : '');
                                    echo !empty($data['settings'][$pop_text_key]) ? nl2br($data['settings'][$pop_text_key]) : $t['about_text']; 
                                ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </div>
    </section>

    <!-- Como Funciona -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title-blue"><?php 
                echo ($data['lang'] == 'pt') 
                    ? (!empty($data['settings']['how_it_works_title']) ? $data['settings']['how_it_works_title'] : $t['how_it_works_title']) 
                    : (!empty($data['settings']['how_it_works_title_en']) ? $data['settings']['how_it_works_title_en'] : $t['how_it_works_title']);
            ?></h2>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="how-it-works-list">
    <div class="d-flex mb-4">
        <div class="how-icon me-3"><i class="bi bi-camera-video"></i></div>
        <div>
            <h5><?php 
                echo ($data['lang'] == 'pt') 
                    ? (!empty($data['settings']['how_it_works_1']) ? $data['settings']['how_it_works_1'] : $t['how_it_works_1']) 
                    : (!empty($data['settings']['how_it_works_1_en']) ? $data['settings']['how_it_works_1_en'] : $t['how_it_works_1']);
            ?></h5>
        </div>
    </div>
    <div class="d-flex mb-4">
        <div class="how-icon me-3"><i class="bi bi-link-45deg"></i></div>
        <div>
            <h5><?php 
                echo ($data['lang'] == 'pt') 
                    ? (!empty($data['settings']['how_it_works_2']) ? $data['settings']['how_it_works_2'] : $t['how_it_works_2']) 
                    : (!empty($data['settings']['how_it_works_2_en']) ? $data['settings']['how_it_works_2_en'] : $t['how_it_works_2']);
            ?></h5>
        </div>
    </div>
    <div class="d-flex mb-4">
        <div class="how-icon me-3"><i class="bi bi-arrow-repeat"></i></div>
        <div>
            <h5><?php 
                echo ($data['lang'] == 'pt') 
                    ? (!empty($data['settings']['how_it_works_3']) ? $data['settings']['how_it_works_3'] : $t['how_it_works_3']) 
                    : (!empty($data['settings']['how_it_works_3_en']) ? $data['settings']['how_it_works_3_en'] : $t['how_it_works_3']);
            ?></h5>
        </div>
    </div>
    <div class="d-flex mb-4">
        <div class="how-icon me-3"><i class="bi bi-chat-left-text"></i></div>
        <div>
            <h5><?php 
                echo ($data['lang'] == 'pt') 
                    ? (!empty($data['settings']['how_it_works_4']) ? $data['settings']['how_it_works_4'] : $t['how_it_works_4']) 
                    : (!empty($data['settings']['how_it_works_4_en']) ? $data['settings']['how_it_works_4_en'] : $t['how_it_works_4']);
            ?></h5>
        </div>
    </div>
</div>

                </div>
                <div class="col-lg-6">
                    <img src="<?php echo !empty($data['settings']['how_it_works_image']) ? URLROOT . '/' . $data['settings']['how_it_works_image'] : URLROOT . '/images/how-it-works-1767718373.png'; ?>" alt="Como Funciona" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Depoimentos -->
    <section class="py-5 bg-white" id="depoimentos">
        <div class="container">
            <h2 class="section-title-blue"><?php echo $t['testimonials_title']; ?></h2>
            <div class="row g-4">
                <?php foreach($data['testimonials'] as $testimonial): ?>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="d-flex align-items-center mb-3">
                            <?php if($testimonial->image_url): ?>
                                <img src="<?php echo URLROOT . '/' . $testimonial->image_url; ?>" alt="<?php echo $testimonial->student_name; ?>" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <?php else: ?>
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px; font-size: 1.5rem;">
                                    <?php echo substr($testimonial->student_name, 0, 1); ?>
                                </div>
                            <?php endif; ?>
                            <div>
                                <h5 class="mb-0"><?php echo $testimonial->student_name; ?></h5>
                                <div class="text-warning">
                                    <?php for($i=0; $i<$testimonial->rating; $i++): ?>
                                        <i class="bi bi-star-fill"></i>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </div>
                        <p class="mb-0">"<?php echo $testimonial->content; ?>"</p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

   <!-- Planos -->
<section class="py-5 bg-light" id="planos">
    <div class="container">
        <h2 class="section-title-blue">
            <?php 
                // Título em Português ou Inglês baseado na variável de idioma
                if(isset($lang) && $lang == 'en') {
                    echo "Our Plans";
                } else {
                    echo "Nossos Planos";
                }
            ?>
        </h2>
        
        <!-- Texto abaixo do título -->
        <p class="text-center mb-4">
            <?php 
                if($data['lang'] == 'en') {
                    echo "Want to learn more?";
                } else {
                    echo "Quer saber mais?";
                }
            ?>
        </p>

        <!-- Botão de falar com o Prof. Wilson -->
        <div class="text-center mt-4">
            <a href="https://api.whatsapp.com/send?phone=<?php echo preg_replace('/[^0-9]/', '', $data['settings']['whatsapp_number'] ?? '5518997254444'); ?>&text=Olá Prof. Wilson, gostaria de saber mais sobre os planos." class="btn-green" target="_blank" style="padding: 12px 25px; text-decoration: none; border-radius: 5px; font-weight: bold;">
                <?php 
                    if($data['lang'] == 'en') {
                        echo "Chat with us";
                    } else {
                        echo "Fale conosco";
                    }
                ?>
            </a>
        </div>
    </div>
</section>
    <!-- Contato -->
    <section class="py-5 bg-white" id="contato">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="section-title-blue" style="text-align: left;"><?php echo $t['contact_title']; ?></h2>
                    <p class="mb-4">
                        <?php if ($data['lang'] == 'en'): ?>
                            For questions about lessons, programs, or availability, please fill out the form below. I’ll be in touch as soon as possible.
                        <?php else: ?>
                            <?php echo $t['contact_subtitle']; ?>
                        <?php endif; ?>
                    </p>
                    
                    <form id="contactForm" class="bg-white p-4 rounded shadow-sm">
                        <div class="mb-3">
                            <label class="form-label"><?php echo $t['form_name']; ?></label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><?php echo $t['form_email']; ?></label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><?php echo $t['form_whatsapp']; ?></label>
                            <input type="text" name="whatsapp" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><?php echo $data['lang'] == 'en' ? 'Message' : $t['form_message']; ?></label>
                            <textarea name="message" class="form-control" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn-green w-100"><?php echo $t['form_submit']; ?></button>
                    </form>
                    <div id="formResponse" class="mt-3"></div>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0">
                    <div class="ps-lg-5">
                        <h4 class="mb-4"><?php echo $t['nav_contact']; ?></h4>
                        <div class="d-flex mb-3">
                            <i class="bi bi-whatsapp text-success fs-4 me-3"></i>
                            <div>
                                <h6>WhatsApp</h6>
                                <p><?php echo $data['settings']['whatsapp_number'] ?? '(18) 99725-4444'; ?></p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <i class="bi bi-envelope text-primary fs-4 me-3"></i>
                            <div>
                                <h6>E-mail</h6>
                                <p><?php echo $data['settings']['contact_email'] ?? 'wilson@englishatwill.com.br'; ?></p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <i class="bi bi-geo-alt text-danger fs-4 me-3"></i>
                            <div>
                                <h6>Localização</h6>
                                <p><?php echo $data['settings']['contact_location'] ?? 'Presidente Prudente - SP (Atendimento Online)'; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-5 bg-dark text-white text-center">
        <div class="container">
            <div class="social-icons mb-4">
                <?php if (!empty($data['settings']['social_instagram_url'])): ?>
                    <a href="<?php echo $data['settings']['social_instagram_url']; ?>" class="text-white mx-3 fs-3" target="_blank"><i class="bi bi-instagram"></i></a>
                <?php endif; ?>
                <?php if (!empty($data['settings']['social_facebook_url'])): ?>
                    <a href="<?php echo $data['settings']['social_facebook_url']; ?>" class="text-white mx-3 fs-3" target="_blank"><i class="bi bi-facebook"></i></a>
                <?php endif; ?>
                <?php if (!empty($data['settings']['social_youtube_url'])): ?>
                    <a href="<?php echo $data['settings']['social_youtube_url']; ?>" class="text-white mx-3 fs-3" target="_blank"><i class="bi bi-youtube"></i></a>
                <?php endif; ?>
                <?php if (!empty($data['settings']['social_linkedin_url'])): ?>
                    <a href="<?php echo $data['settings']['social_linkedin_url']; ?>" class="text-white mx-3 fs-3" target="_blank"><i class="bi bi-linkedin"></i></a>
                <?php endif; ?>
            </div>
            <div class="share-icons mb-4">
                <small class="d-block mb-2 text-white-50"><?php echo $data['lang'] == 'pt' ? 'Compartilhe:' : 'Share:'; ?></small>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode('https://englishatwill.com.br'); ?>" target="_blank" class="btn btn-outline-light btn-sm mx-1"><i class="bi bi-facebook"></i></a>
                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode('https://englishatwill.com.br'); ?>" target="_blank" class="btn btn-outline-light btn-sm mx-1"><i class="bi bi-twitter-x"></i></a>
                <a href="https://api.whatsapp.com/send?text=<?php echo urlencode('Confira o site da English At Will: https://englishatwill.com.br'); ?>" target="_blank" class="btn btn-outline-light btn-sm mx-1"><i class="bi bi-whatsapp"></i></a>
            </div>
            <p class="mb-2">&copy; <?php echo date('Y'); ?> English At Will. <?php echo $t['footer_rights']; ?></p>
            <div class="admin-login-link mt-3">
                <a href="index.php?url=admin/login" class="btn btn-outline-light btn-sm" style="opacity: 0.6; font-size: 0.7rem;">
                    <i class="bi bi-lock-fill"></i> <?php echo $data['lang'] == 'pt' ? 'Área Administrativa' : 'Admin Area'; ?>
                </a>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Floating Button -->
    <a href="https://api.whatsapp.com/send?phone=<?php echo preg_replace('/[^0-9]/', '', $data['settings']['whatsapp_number'] ?? '5518997254444'); ?>" class="whatsapp-float" target="_blank">
        <i class="bi bi-whatsapp"></i>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo URLROOT; ?>/js/main.js"></script>
</body>
</html>
