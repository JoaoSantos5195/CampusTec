//FORMATAÇÃO CURRICULO
document.getElementById('telefone').addEventListener('input', function (e) {
    // Remove caracteres não numéricos
    let input = e.target.value.replace(/\D/g, '');

    // Formata o número de telefone
    if (input.length > 6) {
        // Formata como (XX) XXXXX-XXXX
        input = input.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
    } else if (input.length > 2) {
        // Formata como (XX) XXXX-XXXX
        input = input.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
    } else if (input.length > 0) {
        // Formata como (XX)
        input = input.replace(/(\d{2})/, '($1)');
    }

    e.target.value = input; // Atualiza o valor do campo
});

function gerarPDF() {
    const {
        jsPDF
    } = window.jspdf;
    const doc = new jsPDF();

    doc.setFont("helvetica", "bold");
    doc.setFontSize(20);
    const nome = document.getElementById("nome").value;
    doc.text(`${nome}`, 10, 20);

    doc.setFont("times", "normal");
    doc.setFontSize(12);
    const email = document.getElementById("email").value;
    const telefone = document.getElementById("telefone").value;
    const endereco = document.getElementById("endereco").value;
    const experiencia = document.getElementById("experiencia").value;
    const habilidades = document.getElementById("habilidades").value;
    const formacao = document.getElementById("formacao").value;

    const pageHeight = doc.internal.pageSize.height;
    let currentY = 40;

    function addTextWithLineBreak(text, x, y) {
        const lineHeight = 10;
        const lines = doc.splitTextToSize(text, 180);
        for (let i = 0; i < lines.length; i++) {
            if (y + lineHeight > pageHeight - 20) {
                doc.addPage();
                y = 20;
            }
            doc.text(lines[i], x, y);
            y += lineHeight;
        }
        return y;
    }

    doc.setFont("helvetica", "bold");
    doc.setFontSize(16);
    doc.text(`Email:`, 10, currentY);
    doc.setFont("times", "normal");
    currentY = addTextWithLineBreak(email, 10, currentY + 10);

    doc.setFont("helvetica", "bold");
    doc.setFontSize(16);
    doc.text(`Telefone:`, 10, currentY);
    doc.setFont("times", "normal");
    currentY = addTextWithLineBreak(telefone, 10, currentY + 10);

    doc.setFont("helvetica", "bold");
    doc.setFontSize(16);
    doc.text(`Endereço:`, 10, currentY);
    doc.setFont("times", "normal");
    currentY = addTextWithLineBreak(endereco, 10, currentY + 10);

    doc.setFont("helvetica", "bold");
    doc.setFontSize(16);
    doc.text(`Experiência Profissional:`, 10, currentY);
    doc.setFont("times", "normal");
    currentY = addTextWithLineBreak(experiencia, 10, currentY + 10);

    doc.setFont("helvetica", "bold");
    doc.setFontSize(16);
    doc.text(`Habilidades:`, 10, currentY + 10);
    doc.setFont("times", "normal");
    currentY = addTextWithLineBreak(habilidades, 10, currentY + 20);

    doc.setFont("helvetica", "bold");
    doc.setFontSize(16);
    doc.text(`Formação Acadêmica:`, 10, currentY + 10);
    doc.setFont("times", "normal");
    currentY = addTextWithLineBreak(formacao, 10, currentY + 20);

    const fileInput = document.getElementById("imagem");
    if (fileInput.files.length > 0) {
        const file = fileInput.files[0];
        const reader = new FileReader();

        reader.onload = function (event) {
            const imgData = event.target.result;
            doc.addImage(imgData, 'JPEG', 150, 10, 50, 50);
            doc.save("curriculo.pdf");
        };

        reader.readAsDataURL(file);
    } else {
        doc.save("curriculo.pdf");
    }
}