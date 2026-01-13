CREATE DATABASE IF NOT EXISTS u686465056_english;
USE u686465056_english;

-- Tabela de usuários (admin)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabela de depoimentos
CREATE TABLE IF NOT EXISTS testimonials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    rating INT DEFAULT 5,
    image_url VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabela de cursos/serviços
CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    icon VARCHAR(50) DEFAULT 'bi-book',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabela de mensagens de contato
CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    whatsapp VARCHAR(20) NOT NULL,
    message TEXT NOT NULL,
    status ENUM('new', 'read', 'replied') DEFAULT 'new',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabela de configurações do site
CREATE TABLE IF NOT EXISTS settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(50) NOT NULL UNIQUE,
    setting_value TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabela de Posts do Blog
CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    title_en VARCHAR(255),
    slug VARCHAR(255) NOT NULL UNIQUE,
    content TEXT NOT NULL,
    content_en TEXT,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Inserir usuário admin padrão (senha: admin123)
INSERT INTO users (username, password) VALUES ('wilsonmarcal@gmail.com', '$2y$10$YZlEfWY2yQkecc9oobYJVuyx7rUFvq.H/qp2GXyLtkbGAa3rvsHtK');

-- Inserir configurações iniciais
INSERT INTO settings (setting_key, setting_value) VALUES 
('site_title', 'English At Will'),
('hero_title', 'Aprenda inglês de forma natural e definitiva'),
('hero_subtitle', 'Aulas personalizadas e Online.'),
('whatsapp_number', '5518997254444'),
('contact_email', 'wilson@englishatwill.com.br'),
('contact_location', 'Presidente Prudente - SP (Atendimento Online)'),
('methodology_title', 'O CURSO DE INGLÊS DA ENGLISH AT WILL'),
('methodology_1_title', 'Metodologia Comunicativa e Imersão no Idioma'),
('methodology_1_desc', 'Independentemente da faixa etária ou do nível de proficiência com que o aluno inicia o curso, a condução das aulas na English at Will acontece prioritariamente em língua inglesa. Desde o primeiro contato com o idioma, o aluno é exposto de forma contínua às quatro habilidades fundamentais da comunicação: ouvir, falar, ler e escrever.'),
('methodology_2_title', 'Materiais Didáticos Personalizados por Objetivo'),
('methodology_2_desc', 'Na English at Will, os materiais didáticos são cuidadosamente desenvolvidos de acordo com o perfil, os objetivos e as necessidades específicas de cada aluno. Seja para viagens internacionais, conversação, crescimento profissional, promoções no trabalho, provas acadêmicas ou aquisição idiomática completa, todo o percurso pedagógico é planejado de forma personalizada.'),
('methodology_3_title', 'Desenvolvimento de Competências em Interpretação Textual'),
('methodology_3_desc', 'Além das aulas voltadas à conversação, a English at Will oferece um trabalho específico voltado ao desenvolvimento de competências em interpretação textual. Essas aulas atendem alunos que se preparam para vestibulares, concursos públicos e avaliações acadêmicas, tanto em instituições públicas quanto privadas.'),
('methodology_4_title', 'Acompanhamento Individualizado e Avaliação Contínua'),
('methodology_4_desc', 'Durante todo o processo de aprendizagem, a English at Will mantém um acompanhamento individualizado e humanizado, com comunicação direta entre professor, aluno e família por meio de aplicativo. Esse acompanhamento permite identificar habilidades já desenvolvidas, pontos que podem ser aprimorados e estratégias para avançar no aprendizado.');

-- Inserir alguns cursos iniciais
INSERT INTO courses (title, description, icon) VALUES 
('Inglês para Iniciantes', 'Comece sua jornada do zero com uma metodologia prática e envolvente.', 'bi-star'),
('Inglês para Conversação', 'Foque na fluência e perca o medo de falar com aulas dinâmicas.', 'bi-chat-dots'),
('Inglês para Viagens', 'Prepare-se para suas aventuras internacionais com o vocabulário essencial.', 'bi-airplane'),
('Inglês Profissional', 'Destaque-se no mercado de trabalho com inglês voltado para negócios.', 'bi-briefcase');

-- Inserir alguns depoimentos iniciais
INSERT INTO testimonials (student_name, content, rating) VALUES 
('João Silva', 'As aulas do English At Will mudaram minha perspectiva sobre aprender inglês. Recomendo muito!', 5),
('Maria Oliveira', 'Metodologia excelente e foco total na conversação. Finalmente estou perdendo o medo.', 5),
('Carlos Santos', 'O melhor professor. Flexibilidade e conteúdo de alta qualidade.', 5);

-- Inserir artigo inicial do blog
INSERT INTO posts (title, title_en, slug, content, content_en, image_url) VALUES 
('A importância de aprender inglês', 
 'The importance of learning English', 
 'a-importancia-de-aprender-ingles', 
 'Aprender inglês hoje em dia não é mais um luxo, mas uma necessidade fundamental. Seja para o crescimento profissional, para viagens ou para ter acesso a uma quantidade infinita de informações, o inglês é a chave que abre portas em todo o mundo.\n\nNo mercado de trabalho, profissionais que dominam o idioma têm acesso a melhores oportunidades e salários mais altos. Além disso, a maioria dos conteúdos acadêmicos e tecnológicos de ponta são publicados primeiramente em inglês.\n\nNa English At Will, focamos em uma aprendizagem natural, para que você se sinta à vontade para se comunicar em qualquer situação.', 
 'Learning English nowadays is no longer a luxury, but a fundamental necessity. Whether for professional growth, travel, or access to an infinite amount of information, English is the key that opens doors worldwide.\n\nIn the job market, professionals who master the language have access to better opportunities and higher salaries. Furthermore, most cutting-edge academic and technological content is published first in English.\n\nAt English At Will, we focus on natural learning, so you feel comfortable communicating in any situation.', 
 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1200&q=80');

-- Configurações para a seção "Para Quem São as Aulas"
INSERT INTO settings (setting_key, setting_value) VALUES 
('audience_title', 'Para Quem São as Aulas'),
('audience_title_en', 'Who the Classes Are For'),
('audience_1_text', 'Crianças & Teens'),
('audience_1_text_en', 'Kids & Teens'),
('audience_1_image', 'images/audience-kids.png'),
('audience_2_text', 'Vestibular & ENEM'),
('audience_2_text_en', 'Entrance Exams & ENEM'),
('audience_2_image', 'images/audience-teens.png'),
('audience_3_text', 'Adultos & Profissionais'),
('audience_3_text_en', 'Adults & Professionals'),
('audience_3_image', 'images/audience-adults.png'),
('audience_4_text', 'Conversação & Viagem'),
('audience_4_text_en', 'Conversation & Travel'),
('audience_4_image', 'images/audience-travel.png');
