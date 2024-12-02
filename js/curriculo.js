document.getElementById('telefone').addEventListener('input', function (e) {
    // Remove caracteres não numéricos
    let input = e.target.value.replace(/\D/g, '');

    // Formata o número de telefone
    if (input.length > 10) {
        // Formata como (XX) XXXXX-XXXX
        input = input.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
    } else if (input.length > 6) {
        // Formata como (XX) XXXX-XXXX
        input = input.replace(/(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
    } else if (input.length > 2) {
        // Formata como (XX) XXXX
        input = input.replace(/(\d{2})(\d{0,4})/, '($1) $2');
    } else if (input.length > 0) {
        // Formata como (XX)
        input = input.replace(/(\d{0,2})/, '($1');
    }

    e.target.value = input; // Atualiza o valor do campo
});

function gerarPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // Coleta os dados
    const nome = document.getElementById("nome").value;
    const email = document.getElementById("email").value;
    const telefone = document.getElementById("telefone").value;
    const endereco = document.getElementById("endereco").value;
    const experiencia = document.getElementById("experiencia").value;
    const habilidades = document.getElementById("habilidades").value;
    const formacao = document.getElementById("formacao").value;

    const pageHeight = doc.internal.pageSize.height;
    let currentY = 40; // Posição inicial no eixo Y

    // Função para adicionar rodapé
    function addFooter(doc) {
        const pageWidth = doc.internal.pageSize.width;
        const footerText = "Feito com CampusTec";

        doc.setFont("helvetica", "italic");
        doc.setFontSize(10);
        doc.text(footerText, pageWidth / 2, pageHeight - 10, { align: "center" });
    }

    // Função para desenhar cabeçalhos das seções
    function drawSectionHeader(doc, title, x, y) {
        doc.setFont("helvetica", "bold");
        doc.setFontSize(16);
        doc.setDrawColor(0, 0, 0);
        doc.setFillColor(230, 230, 230); // Fundo cinza claro
        doc.rect(x - 5, y - 8, 190, 12, 'F'); // Caixa de fundo
        doc.text(title, x, y);
    }

    // Função para adicionar texto com quebra automática
    function addTextWithLineBreak(text, x, y) {
        const lineHeight = 8; // Ajusta a altura da linha
        const lines = doc.splitTextToSize(text, 180); // Quebra o texto para caber
        for (let i = 0; i < lines.length; i++) {
            if (y + lineHeight > pageHeight - 20) {
                doc.addPage();
                y = 20;
                addFooter(doc); // Adiciona rodapé na nova página
            }
            doc.text(lines[i], x, y);
            y += lineHeight;
        }
        return y;
    }

    // Adiciona o título e uma linha abaixo
    doc.setFont("helvetica", "bold");
    doc.setFontSize(22);
    doc.text(nome, doc.internal.pageSize.width / 2, 20, { align: "center" });
    doc.line(20, 25, doc.internal.pageSize.width - 20, 25);

    // Adiciona as seções
    drawSectionHeader(doc, "Email e Telefone:", 10, currentY);
    currentY = addTextWithLineBreak(`Email: ${email}\nTelefone: ${telefone}`, 10, currentY + 10);

    drawSectionHeader(doc, "Endereço:", 10, currentY + 10);
    currentY = addTextWithLineBreak(endereco, 10, currentY + 20);

    drawSectionHeader(doc, "Experiência Profissional:", 10, currentY + 10);
    currentY = addTextWithLineBreak(experiencia, 10, currentY + 20);

    drawSectionHeader(doc, "Habilidades:", 10, currentY + 10);
    currentY = addTextWithLineBreak(habilidades, 10, currentY + 20);

    drawSectionHeader(doc, "Formação Acadêmica:", 10, currentY + 10);
    currentY = addTextWithLineBreak(formacao, 10, currentY + 20);

    // Adiciona imagem do perfil
    const fileInput = document.getElementById("imagem");
    if (fileInput.files.length > 0) {
        const file = fileInput.files[0];
        const reader = new FileReader();

        reader.onload = function (event) {
            const imgData = event.target.result;
            doc.addImage(imgData, 'JPEG', doc.internal.pageSize.width / 2 - 25, 30, 50, 50); // Centraliza imagem
            addFooter(doc);
            doc.save("curriculo.pdf");
        };

        reader.readAsDataURL(file);
    } else {
        addFooter(doc);
        doc.save("curriculo.pdf");
    }
}
