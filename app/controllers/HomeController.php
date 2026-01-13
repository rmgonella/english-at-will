<?php
class HomeController extends Controller {
    private $courseModel;
    private $testimonialModel;
    private $settingModel;
    private $contactModel;

    public function __construct() {
        $this->courseModel = $this->model('Course');
        $this->testimonialModel = $this->model('Testimonial');
        $this->settingModel = $this->model('Setting');
        $this->contactModel = $this->model('Contact');
    }

    public function index() {
        // Inicializar variáveis vazias para evitar erros se o banco falhar
        $courses = [];
        $testimonials = [];
        $settings = [];

        try {
            $courses = $this->courseModel->getAll() ?: [];
            $testimonials = $this->testimonialModel->getAll() ?: [];
            $settings = $this->settingModel->getAll() ?: [];
            
            // Incrementar contador de acessos
            $views = isset($settings['site_views']) ? (int)$settings['site_views'] : 0;
            $this->settingModel->update('site_views', $views + 1);
            
        } catch (Exception $e) {
            error_log("Erro ao buscar dados: " . $e->getMessage());
        }

        $data = [
            'title' => 'English At Will - Inglês de verdade é inglês à vontade',
            'courses' => $courses,
            'testimonials' => $testimonials,
            'settings' => $settings
        ];

        $this->view('home', $data);
    }

    public function contact() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
            $email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
            $whatsapp = isset($_POST['whatsapp']) ? htmlspecialchars(trim($_POST['whatsapp'])) : '';
            $message = isset($_POST['message']) ? htmlspecialchars(trim($_POST['message'])) : '';

            if (empty($name) || empty($email) || empty($whatsapp) || empty($message)) {
                echo json_encode(['status' => 'error', 'message' => 'Por favor, preencha todos os campos.']);
                return;
            }

            $data = [
                'name' => $name,
                'email' => $email,
                'whatsapp' => $whatsapp,
                'message' => $message
            ];

            if ($this->contactModel->create($data)) {
                echo json_encode(['status' => 'success', 'message' => 'Mensagem enviada com sucesso!']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Erro ao enviar mensagem no banco de dados.']);
            }
        }
    }
}
?>
