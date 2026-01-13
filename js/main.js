document.addEventListener('DOMContentLoaded', function() {
    // Scroll suave para links internos
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                window.scrollTo({
                    top: target.offsetTop - 80,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Validação e envio do formulário de contato via AJAX
    const contactForm = document.getElementById('contactForm');
    const formMessage = document.getElementById('formResponse');

    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Limpar mensagens anteriores
            formMessage.innerHTML = '<div class="loading"></div> Enviando...';
            formMessage.className = 'alert alert-info';

            const formData = new FormData(this);

            fetch('index.php?url=home/contact', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    formMessage.innerHTML = '<i class="bi bi-check-circle"></i> ' + data.message;
                    formMessage.className = 'alert alert-success';
                    contactForm.reset();
                    
                    // Integração com WhatsApp (opcional, abre após sucesso)
                    const name = formData.get('name');
                    const message = formData.get('message');
                    const whatsappNumber = '5518997254444';
                    const whatsappUrl = `https://api.whatsapp.com/send?phone=${whatsappNumber}&text=Olá, meu nome é ${name}. ${message}`;
                    
                    setTimeout(() => {
                        if (confirm('Deseja também enviar esta mensagem via WhatsApp?')) {
                            window.open(whatsappUrl, '_blank');
                        }
                    }, 2000);
                } else {
                    formMessage.innerHTML = '<i class="bi bi-exclamation-circle"></i> ' + data.message;
                    formMessage.className = 'alert alert-error';
                }
            })
            .catch(error => {
                formMessage.innerHTML = '<i class="bi bi-exclamation-circle"></i> Ocorreu um erro ao enviar a mensagem.';
                formMessage.className = 'alert alert-error';
                console.error('Error:', error);
            });
        });
    }

    // Efeito de sombra na navbar ao rolar removido para evitar conflitos de estilo.

    // Animações simples ao rolar (Intersection Observer)
    const observerOptions = {
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.course-card, .testimonial-card, .section-title').forEach(el => {
        observer.observe(el);
    });
});
