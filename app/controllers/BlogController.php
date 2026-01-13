<?php
class BlogController extends Controller {
    private $postModel;
    private $settingModel;

    public function __construct() {
        $this->postModel = $this->model('Post');
        $this->settingModel = $this->model('Setting');
    }

    public function index() {
        $posts = $this->postModel->getAll();
        $settings = $this->settingModel->getAll();
        
        $data = [
            'title' => 'Blog - English At Will',
            'posts' => $posts,
            'settings' => $settings
        ];

        $this->view('blog/index', $data);
    }

    public function post($slug) {
        $post = $this->postModel->getBySlug($slug);
        $settings = $this->settingModel->getAll();

        if (!$post) {
            header('Location: index.php?url=blog');
            exit;
        }

        $data = [
            'title' => $post->title . ' - English At Will',
            'post' => $post,
            'settings' => $settings
        ];

        $this->view('blog/post', $data);
    }
}
?>
