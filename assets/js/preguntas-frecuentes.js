document.addEventListener('DOMContentLoaded', function () {

    const questions = document.querySelectorAll('.faq-question');

    questions.forEach(question => {
        question.addEventListener('click', function (e) {
            const answer = this.nextElementSibling;
            const isOpen = this.classList.contains('active');

            // --- Ripple effect ---
            const ripple = document.createElement('span');
            ripple.className = 'ripple';
            const rect = this.getBoundingClientRect();
            ripple.style.left = (e.clientX - rect.left) + 'px';
            ripple.style.top = (e.clientY - rect.top) + 'px';
            this.appendChild(ripple);
            setTimeout(() => ripple.remove(), 600);

            // --- Cierra todas las demás respuestas ---
            questions.forEach(q => {
                if (q !== this) {
                    q.classList.remove('active');
                    const otherAnswer = q.nextElementSibling;
                    otherAnswer.style.maxHeight = null;
                    otherAnswer.classList.remove('open');
                }
            });

            // --- Toggle la pregunta actual ---
            this.classList.toggle('active');

            if (!isOpen) {
                // Abrir suavemente
                answer.style.maxHeight = answer.scrollHeight + 'px';
                setTimeout(() => answer.classList.add('open'), 20);
            } else {
                // Cerrar suavemente
                answer.style.maxHeight = null;
                answer.classList.remove('open');
            }
        });
    });

});