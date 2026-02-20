document.addEventListener('DOMContentLoaded', function () {
    const questions = document.querySelectorAll('.faq-question');

    questions.forEach(question => {
        question.addEventListener('click', function () {
            const answer = this.nextElementSibling;
            const isOpen = this.classList.contains('active');

            
            questions.forEach(q => {
                if (q !== this) {
                    q.classList.remove('active');
                    const otherAnswer = q.nextElementSibling;
                    otherAnswer.style.maxHeight = null;
                }
            });

            // TOGGLE ACTUAL
            this.classList.toggle('active');

            if (!isOpen) {
                // ABRIR SUAVEMENTE
                answer.style.maxHeight = answer.scrollHeight + 'px';
            } else {
                // CERRAR SUAVEMENTE
                answer.style.maxHeight = null;
            }
        });
    });
});