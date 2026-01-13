<?php
class AdminController extends Controller {
    private $userModel;
    private $courseModel;
    private $testimonialModel;
    private $contactModel;
    private $settingModel;
    private $postModel;

    public function __construct() {
        $this->userModel = $this->model('User');
        $this->courseModel = $this->model('Course');
        $this->testimonialModel = $this->model('Testimonial');
        $this->contactModel = $this->model('Contact');
        $this->settingModel = $this->model('Setting');
        $this->postModel = $this->model('Post');
    }

    private function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    public function index() {
        if (!$this->isLoggedIn()) {
            header('Location: index.php?url=admin/login');
            exit;
        }

        $courses = $this->courseModel->getAll() ?: [];
        $testimonials = $this->testimonialModel->getAll() ?: [];
        $contacts = $this->contactModel->getAll() ?: [];
        $settings = $this->settingModel->getAll() ?: [];
        $posts = $this->postModel->getAll() ?: [];
        
        // Contador de acessos (usando as configurações para armazenar)
        $site_views = isset($settings['site_views']) ? (int)$settings['site_views'] : 0;

        $data = [
            'courses_count' => count($courses),
            'testimonials_count' => count($testimonials),
            'posts_count' => count($posts),
            'site_views' => $site_views,
            'contacts' => $contacts,
            'testimonials' => $testimonials,
            'settings' => $settings
        ];

        $this->view('admin/dashboard', $data);
    }

    public function login() {
        if ($this->isLoggedIn()) {
            header('Location: index.php?url=admin');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = isset($_POST['username']) ? trim($_POST['username']) : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            if (empty($username) || empty($password)) {
                $data = ['error' => 'Preencha todos os campos'];
                $this->view('admin/login', $data);
                return;
            }

            $user = $this->userModel->login($username, $password);

            if ($user) {
                $_SESSION['user_id'] = $user->id;
                $_SESSION['username'] = $user->username;
                header('Location: index.php?url=admin');
                exit;
            } else {
                $data = ['error' => 'Usuário ou senha inválidos'];
                $this->view('admin/login', $data);
            }
        } else {
            $this->view('admin/login');
        }
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        session_destroy();
        header('Location: index.php?url=admin/login');
        exit;
    }

    public function courses() {
        if (!$this->isLoggedIn()) {
            header('Location: index.php?url=admin/login');
            exit;
        }
        $courses = $this->courseModel->getAll();
        $this->view('admin/courses', ['courses' => $courses]);
    }

    public function testimonials() {
        if (!$this->isLoggedIn()) {
            header('Location: index.php?url=admin/login');
            exit;
        }
        $testimonials = $this->testimonialModel->getAll();
        $this->view('admin/testimonials', ['testimonials' => $testimonials]);
    }

    public function addTestimonial() {
        if (!$this->isLoggedIn()) {
            header('Location: index.php?url=admin/login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $image_url = $_POST['image_url'] ?? '';

            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $upload_dir = 'images/testimonials/';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                $file_name = time() . '_' . basename($_FILES['image']['name']);
                $target_file = $upload_dir . $file_name;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    $image_url = $target_file;
                }
            }

            $data = [
                'student_name' => $_POST['student_name'],
                'content' => $_POST['content'],
                'rating' => $_POST['rating'],
                'image_url' => $image_url
            ];

            if ($this->testimonialModel->create($data)) {
                header('Location: index.php?url=admin/testimonials&success=1');
                exit;
            }
        }
    }

    public function editTestimonial($id) {
        if (!$this->isLoggedIn()) {
            header('Location: index.php?url=admin/login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $testimonial = $this->testimonialModel->getById($id);
            $image_url = $_POST['image_url'] ?? ($testimonial->image_url ?? '');

            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $upload_dir = 'images/testimonials/';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                $file_name = time() . '_' . basename($_FILES['image']['name']);
                $target_file = $upload_dir . $file_name;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    $image_url = $target_file;
                }
            }

            $data = [
                'id' => $id,
                'student_name' => $_POST['student_name'],
                'content' => $_POST['content'],
                'rating' => $_POST['rating'],
                'image_url' => $image_url
            ];

            if ($this->testimonialModel->update($data)) {
                header('Location: index.php?url=admin/testimonials&success=1');
                exit;
            }
        }
    }

    public function deleteTestimonial($id) {
        if (!$this->isLoggedIn()) {
            header('Location: index.php?url=admin/login');
            exit;
        }

        if ($this->testimonialModel->delete($id)) {
            header('Location: index.php?url=admin/testimonials&success=1');
            exit;
        }
    }

    public function contacts() {
        if (!$this->isLoggedIn()) {
            header('Location: index.php?url=admin/login');
            exit;
        }
        $contacts = $this->contactModel->getAll();
        $this->view('admin/contacts', ['contacts' => $contacts]);
    }

    public function markContactRead($id) {
        if (!$this->isLoggedIn()) {
            header('Location: index.php?url=admin/login');
            exit;
        }
        $this->contactModel->updateStatus($id, 'read');
        header('Location: index.php?url=admin/contacts');
        exit;
    }

    public function deleteContact($id) {
        if (!$this->isLoggedIn()) {
            header('Location: index.php?url=admin/login');
            exit;
        }
        $this->contactModel->delete($id);
        header('Location: index.php?url=admin/contacts');
        exit;
    }

    public function settings() {
        if (!$this->isLoggedIn()) {
            header('Location: index.php?url=admin/login');
            exit;
        }
        $settings = $this->settingModel->getAll();
        $this->view('admin/settings', ['settings' => $settings]);
    }

    public function editHome() {
        if (!$this->isLoggedIn()) {
            header('Location: index.php?url=admin/login');
            exit;
        }
        $settings = $this->settingModel->getAll();
        $this->view('admin/edit_home', ['settings' => $settings]);
    }

    public function updateSettings() {
        if (!$this->isLoggedIn()) {
            header('Location: index.php?url=admin/login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            foreach ($_POST as $key => $value) {
                $this->settingModel->update($key, $value);
            }
            header('Location: index.php?url=admin/settings&success=1');
            exit;
        }
    }

    public function updateHome() {
        if (!$this->isLoggedIn()) {
            header('Location: index.php?url=admin/login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Identificar quais campos devem ser atualizados com base no idioma
            $lang = $_POST['lang'] ?? null;

            // Processar campos de texto
            foreach ($_POST as $key => $value) {
                if ($key === 'lang') continue;

                // Lista de campos globais conhecidos (comuns a ambos os idiomas)
                $global_fields = ['whatsapp_number', 'contact_email', 'contact_location', 'social_tiktok_url', 'social_instagram_url', 'social_facebook_url', 'social_youtube_url', 'social_linkedin_url', 'social_title', 'social_title_en'];

                // Se estamos editando um idioma específico, filtramos os campos
                if ($lang === 'pt') {
                    // No formulário PT, os campos NÃO terminam em _en
                    // Mas queremos permitir campos globais também
                    if (substr($key, -3) === '_en' && !in_array($key, $global_fields)) {
                        continue;
                    }
                } elseif ($lang === 'en') {
                    // No formulário EN, os campos terminam em _en
                    // Mas queremos permitir campos globais também
                    if (substr($key, -3) !== '_en' && !in_array($key, $global_fields)) {
                        continue;
                    }
                }

                $this->settingModel->update($key, $value);
            }

            // Processar upload de imagem para a seção "Como Funciona"
            if (isset($_FILES['how_it_works_image']) && $_FILES['how_it_works_image']['error'] == 0) {
                $upload_dir = 'images/';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                $file_name = 'how-it-works-' . time() . '.' . pathinfo($_FILES['how_it_works_image']['name'], PATHINFO_EXTENSION);
                $target_file = $upload_dir . $file_name;
                if (move_uploaded_file($_FILES['how_it_works_image']['tmp_name'], $target_file)) {
                    $this->settingModel->update('how_it_works_image', $target_file);
                }
            }

            // Processar uploads de imagens para as Thumbs (Público-Alvo)
            for ($i = 1; $i <= 4; $i++) {
                $field_name = "audience_{$i}_image";
                if (isset($_FILES[$field_name]) && $_FILES[$field_name]['error'] == 0) {
                    $upload_dir = 'images/';
                    if (!is_dir($upload_dir)) {
                        mkdir($upload_dir, 0777, true);
                    }
                    $file_name = "audience-{$i}-" . time() . '.' . pathinfo($_FILES[$field_name]['name'], PATHINFO_EXTENSION);
                    $target_file = $upload_dir . $file_name;
                    if (move_uploaded_file($_FILES[$field_name]['tmp_name'], $target_file)) {
                        $this->settingModel->update($field_name, $target_file);
                    }
                }
            }

            header('Location: index.php?url=admin/editHome&success=1');
            exit;
        }
    }

    public function posts() {
        if (!$this->isLoggedIn()) {
            header('Location: index.php?url=admin/login');
            exit;
        }
        $posts = $this->postModel->getAll();
        $this->view('admin/posts', ['posts' => $posts]);
    }

    public function addPost() {
        if (!$this->isLoggedIn()) {
            header('Location: index.php?url=admin/login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $image_url = $_POST['image_url'] ?? '';

            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $upload_dir = 'images/blog/';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                $file_name = time() . '_' . basename($_FILES['image']['name']);
                $target_file = $upload_dir . $file_name;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    $image_url = $target_file;
                }
            }

            $data = [
                'title' => $_POST['title'],
                'title_en' => $_POST['title_en'],
                'slug' => $this->createSlug($_POST['title']),
                'content' => $_POST['content'],
                'content_en' => $_POST['content_en'],
                'image_url' => $image_url
            ];

            if ($this->postModel->create($data)) {
                header('Location: index.php?url=admin/posts&success=1');
                exit;
            }
        }

        $this->view('admin/add_post');
    }

    public function editPost($id) {
        if (!$this->isLoggedIn()) {
            header('Location: index.php?url=admin/login');
            exit;
        }

        $post = $this->postModel->getById($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $image_url = $_POST['image_url'] ?? ($post->image_url ?? '');

            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $upload_dir = 'images/blog/';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                $file_name = time() . '_' . basename($_FILES['image']['name']);
                $target_file = $upload_dir . $file_name;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    $image_url = $target_file;
                }
            }

            $data = [
                'id' => $id,
                'title' => $_POST['title'],
                'title_en' => $_POST['title_en'],
                'slug' => $this->createSlug($_POST['title']),
                'content' => $_POST['content'],
                'content_en' => $_POST['content_en'],
                'image_url' => $image_url
            ];

            if ($this->postModel->update($data)) {
                header('Location: index.php?url=admin/posts&success=1');
                exit;
            }
        }

        $this->view('admin/edit_post', ['post' => $post]);
    }

    public function deletePost($id) {
        if (!$this->isLoggedIn()) {
            header('Location: index.php?url=admin/login');
            exit;
        }

        if ($this->postModel->delete($id)) {
            header('Location: index.php?url=admin/posts&success=1');
            exit;
        }
    }

    private function createSlug($text) {
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text);
        if (empty($text)) return 'n-a';
        return $text;
    }
}
?>
