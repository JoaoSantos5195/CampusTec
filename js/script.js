// Array de perguntas
const perguntas = [
    "Fale um pouco sobre você.",
    "Por que você quer este trabalho?",
    "Quais são seus pontos fortes?",
    "Quais são seus pontos fracos?",
    "Como você lida com o estresse no trabalho?",
    "Onde você se vê daqui a 5 anos?",
    "Você prefere trabalhar em equipe ou individualmente?",
    "Conte sobre uma situação desafiadora que você enfrentou.",
    "Como você se organiza para cumprir prazos?",
    "O que te motiva a trabalhar?",
    "Quais suas expectativas salariais?",
    "Como você se mantém atualizado na sua área?",
    "Você tem disponibilidade para viagens?",
    "Por que deveríamos contratar você?",
    "Você tem alguma pergunta para nós?"
];

// Dicionário de palavras-chave (bons exemplos)
const palavrasChavePositivas = {
    "Fale um pouco sobre você.": [
        "dedicado", "experiência", "habilidades", "responsável", "proativo", "determinado", "comprometido", "colaborativo", "criativo", "eficiente", 
        "inovador", "autodidata", "focado", "dinâmico", "adaptável", "confiante", "resiliente", "analítico", "empático", "curioso", 
        "visionário", "estratégico", "solucionador", "flexível", "comunicativo", "persistente", "disciplinado", "entusiasmado", "motivador", "colaborativo"
    ],
    "Por que você quer este trabalho?": [
        "desafio", "crescimento", "oportunidade", "interesse", "contribuir", "desenvolver", "aprender", "impacto", "satisfação", "inovação", 
        "evoluir", "aperfeiçoamento", "valorizar", "desenvolvimento", "colaborar", "estratégico", "parceria", "dedicação", "expansão", "reconhecimento", 
        "potencial", "desempenho", "alinhamento", "entusiasmo", "motivação", "conhecimento", "especialização", "realização", "trabalho em equipe", "metas"
    ],
    "Quais são seus pontos fortes?": [
        "liderança", "comunicação", "organizado", "criativo", "iniciativa", "colaboração", "solução de problemas", "adaptabilidade", "gestão de tempo", "confiabilidade", 
        "decisão", "inteligência emocional", "paciência", "escuta ativa", "orientação a resultados", "foco em detalhes", "planejamento estratégico", "autonomia", "proatividade", "inovação", 
        "visão sistêmica", "efetividade", "dedicação", "empatia", "persistência", "ética", "coerência", "transparência", "capacidade analítica", "aprendizagem contínua"
    ],
    "Quais são seus pontos fracos?": [
        "perfeccionista", "detalhista", "exigente", "ansioso", "autocrítico", "timidez", "impulsivo", "medo de errar", "insegurança", "delegação", 
        "centralizador", "introvertido", "cauteloso", "nervosismo", "demora para decisões", "obsessivo", "controlador", "distração", "sobrecarregado", "hesitação", 
        "insistência", "apego ao detalhe", "falta de confiança", "resistência a críticas", "autonomia limitada", "dificuldade de delegar", "foco excessivo", "demasiado focado em resultados", "autossuficiência", "organização excessiva"
    ],
    "Como você lida com o estresse no trabalho?": [
        "calma", "organização", "foco", "resolução", "controle", "autocontrole", "priorização", "comunicação", "equilíbrio", "resiliência", 
        "planejamento", "flexibilidade", "estratégia", "positividade", "disciplina", "confiança", "efetividade", "assertividade", "prevenção", "preparação", 
        "adaptação", "colaboração", "gestão de tempo", "inteligência emocional", "apoio", "controle emocional", "determinação", "orientação a resultados", "empatia", "resolução rápida"
    ],
    "Onde você se vê daqui a 5 anos?": [
        "crescimento", "liderança", "experiência", "evoluir", "planejamento", "gerenciamento", "conhecimento", "desenvolvimento", "progresso", "objetivo", 
        "avançar", "superação", "estratégia", "inovação", "expansão", "maturidade", "aprendizado", "autonomia", "impacto", "influência", 
        "autodesenvolvimento", "equilíbrio", "destaque", "iniciativa", "capacitação", "solidez", "sustentabilidade", "reconhecimento", "realização", "desafios"
    ],
    "Você prefere trabalhar em equipe ou individualmente?": [
        "flexível", "equipe", "cooperativo", "autônomo", "colaborativo", "adaptável", "interativo", "proativo", "independente", "dinâmico", 
        "sinergia", "responsável", "sociável", "versátil", "trabalho conjunto", "efetivo", "resolução de conflitos", "resiliência", "organizado", "foco", 
        "habilidades interpessoais", "inteligência emocional", "eficiência", "iniciativa", "complementaridade", "confiança", "compartilhamento", "comunicação", "dedicação", "aprendizagem"
    ],
    "Conte sobre uma situação desafiadora que você enfrentou.": [
        "resolvi", "adaptação", "superação", "aprendizado", "resiliência", "perseverança", "iniciativa", "liderança", "criatividade", "estratégia", 
        "resolução de problemas", "colaboração", "flexibilidade", "determinação", "planejamento", "negociação", "organização", "inovação", "comunicação", "habilidade", 
        "autonomia", "autocontrole", "gerenciamento", "foco", "impacto", "execução", "soluções", "eficiência", "estratégico", "gestão de crise"
    ],
    "Como você se organiza para cumprir prazos?": [
        "priorização", "planejamento", "cronograma", "foco", "gestão de tempo", "organização", "controle", "proatividade", "eficiência", "disciplina", 
        "pontualidade", "objetividade", "resolução", "metodologia", "delegação", "preparação", "monitoramento", "resiliência", "adaptação", "orientação", 
        "comprometimento", "cumprimento", "execução", "responsabilidade", "assertividade", "prevenção", "flexibilidade", "iniciativa", "organizado", "detalhamento"
    ],
    "O que te motiva a trabalhar?": [
        "crescimento", "desafios", "resultados", "sucesso", "satisfação", "impacto", "aprendizado", "oportunidades", "inovação", "dedicação", 
        "reconhecimento", "contribuição", "valorização", "realização", "desenvolvimento", "metas", "progresso", "colaboração", "equilíbrio", "autonomia", 
        "potencial", "curiosidade", "evolução", "autossuficiência", "ambição", "autodisciplina", "paixão", "motivação", "objetivos", "criatividade"
    ],
    "Quais suas expectativas salariais?": [
        "compatível", "negociável", "expectativa", "justo", "adequado", "flexível", "razoável", "equilibrado", "médio", "proporcional", 
        "desempenho", "experiência", "ajustável", "benefícios", "competitivo", "atrativo", "escalonável", "comissão", "remuneração variável", "valor de mercado", 
        "reconhecimento", "expectativa salarial", "consistente", "acordo", "proposta justa", "equidade", "salário alinhado", "ajuste salarial", "crescimento financeiro", "remuneração"
    ],
    "Como você se mantém atualizado na sua área?": [
        "cursos", "pesquisas", "treinamentos", "aprendizado", "congressos", "workshops", "palestras", "formação contínua", "certificações", "networking", 
        "inovação", "tendências", "publicações", "comunidades", "fóruns", "mentoria", "desenvolvimento pessoal", "e-learning", "blogs", "tecnologia", 
        "artigos", "livros", "discussões", "colaboração", "desafios", "especialização", "autoaprendizagem", "estudo constante", "capacitação", "desenvolvimento de habilidades"
    ],
    "Você tem disponibilidade para viagens?": [
        "sim", "disponível", "flexível", "comprometido", "aberto", "disposto", "adaptável", "pronto", "acessível", "disposição", 
        "mobilidade", "viagens frequentes", "dedicação", "interesse", "disponibilidade imediata", "preparado", "disponibilidade total", "prontidão", "aceitação", "entendimento", 
        "desafios", "aventureiro", "trabalho externo", "autonomia", "gestão de viagens", "logística", "acompanhamento", "organização", "viagem internacional", "multitarefas"
    ],
    "Por que deveríamos contratar você?": [
        "dedicado", "habilidoso", "experiente", "valor", "comprometido", "determinado", "confiável", "estratégico", "capaz", "responsável", 
        "colaborativo", "eficiente", "proativo", "entusiasmado", "solucionador", "inovador", "criativo", "adaptável", "orientado a resultados", "liderança", 
        "motivação", "paixão", "persistente", "competente", "curiosidade", "iniciativa", "resiliente", "ética", "disponibilidade", "crescimento"
    ],
    "Você tem alguma pergunta para nós?": [
        "crescimento", "expectativas", "equipe", "estratégia", "cultura organizacional", "plano de carreira", "oportunidades", "valores", "inovação", "processos", 
        "visão", "metas", "desafios", "treinamentos", "liderança", "suporte", "planos futuros", "mercado", "expansão", "desenvolvimento", 
        "crescimento profissional", "métodos de avaliação", "impacto", "clientes", "colaboração", "estruturas internas", "responsabilidades", "sucessão", "novas tecnologias", "investimentos"
    ]
};

const palavrasChaveNegativas = {
    "Fale um pouco sobre você.": [
        "preguiçoso", "atrasado", "irresponsável", "desmotivado", "indisciplinado", "improdutivo", "incompetente", "confuso", "limitado", "desorganizado", 
        "distraído", "apático", "inseguro", "desinteressado", "descomprometido", "conflituoso", "dependente", "impaciente", "inflexível", "irritadiço", 
        "passivo", "ineficiente", "tímido", "medroso", "teimoso", "pouco flexível", "desanimado", "desatento", "desconcentrado", "insubordinado"
    ],
    "Por que você quer este trabalho?": [
        "dinheiro", "fácil", "não sei", "comodidade", "falta de opção", "preguiça", "desmotivado", "falta de interesse", "obrigação", "não quero outro", 
        "medo", "insatisfação", "tédio", "ausência de desafios", "comodismo", "falta de ambição", "desprezo", "pressão", "negligência", "exigência", 
        "falta de planejamento", "falta de metas", "sem propósito", "desistência", "apatia", "desalento", "resistência", "falta de criatividade", "despreparado", "impessoal"
    ],
    "Quais são seus pontos fortes?": [
        "nenhum", "fraco", "não tenho", "indefinido", "vazio", "insignificante", "irrelevante", "passivo", "inconstante", "instável", 
        "inadequado", "obsoleto", "frustrado", "pouco eficiente", "pouco confiável", "limitado", "mediano", "frágil", "desmotivado", "incapaz", 
        "desconectado", "superficial", "despreparado", "negligente", "desatualizado", "pouco criativo", "sem iniciativa", "desorganizado", "desconcentrado", "pouco flexível"
    ],
    "Quais são seus pontos fracos?": [
        "preguiça", "procrastinação", "desorganizado", "desmotivado", "inseguro", "atrasado", "confuso", "passivo", "impaciente", "negligente", 
        "indisciplinado", "irritadiço", "teimoso", "nervoso", "tímido", "medroso", "inflexível", "ineficiente", "irresponsável", "apático", 
        "despreparado", "fraco", "ansioso", "impulsivo", "confuso", "desorganização", "indeciso", "ausente", "descomprometido", "medíocre"
    ],
    "Como você lida com o estresse no trabalho?": [
        "nervoso", "desesperado", "grito", "fuga", "evito", "agressivo", "desorganizado", "ansiedade", "confuso", "caótico", 
        "pressão", "insatisfação", "descontrole", "irritação", "frustração", "afobado", "precipitação", "improviso", "desatenção", "procrastinação", 
        "descuidado", "falta de foco", "pânico", "desespero", "inseguro", "evitação", "falta de comunicação", "negligência", "ineficiência", "desânimo"
    ],
    "Onde você se vê daqui a 5 anos?": [
        "não sei", "mesmo lugar", "parado", "desanimado", "estagnado", "sem metas", "indefinido", "desmotivado", "sem planejamento", "inseguro", 
        "confuso", "desorientado", "sem direção", "perdido", "desorganizado", "pouco ambicioso", "sem objetivos", "frustrado", "desesperançado", "apatia", 
        "falta de crescimento", "falta de visão", "sem foco", "indiferente", "acomodado", "desiludido", "sem planos", "desempregado", "pessimista", "desinteressado"
    ],
    "Você prefere trabalhar em equipe ou individualmente?": [
        "não gosto", "sozinho", "difícil", "complicado", "não colaborativo", "conflito", "isolado", "individualista", "desorganizado", "desconfortável", 
        "desmotivado", "falta de confiança", "competitivo", "pouco flexível", "autossuficiente", "isolacionista", "improdutivo", "não coopero", "independente", "teimoso", 
        "não socializo", "antipático", "não participo", "retraído", "evito", "não tenho preferência", "confuso", "falta de comunicação", "indisciplinado", "fraco"
    ],
    "Conte sobre uma situação desafiadora que você enfrentou.": [
        "desisti", "não fiz", "evitei", "medo", "fracassei", "não consegui", "errei", "negligente", "pouco preparado", "incapaz", 
        "desorganizado", "atrasado", "inseguro", "confuso", "falta de apoio", "isolado", "desmotivado", "pressionado", "sem planejamento", "não liderei", 
        "não colaborei", "fiquei perdido", "improvisado", "falta de estratégia", "descontrole", "errei o prazo", "desfocado", "desconcentrado", "perdido", "não concluí"
    ],
    "Como você se organiza para cumprir prazos?": [
        "improviso", "deixo para depois", "procrastino", "atraso", "desorganizado", "confuso", "caótico", "não cumpro", "pressa", "falta de planejamento", 
        "pouco comprometido", "pouco confiável", "não sigo cronograma", "desfocado", "sem disciplina", "inconstante", "falho", "irresponsável", "não priorizo", "sem controle", 
        "deixo acumular", "imprevisto", "sem preparação", "adiamento", "pouca eficiência", "negligente", "falta de responsabilidade", "pressa desnecessária", "desatenção", "atrasado"
    ],
    "O que te motiva a trabalhar?": [
        "dinheiro", "pressão", "forçado", "comodidade", "falta de opção", "obrigações", "tédio", "necessidade", "falta de ambição", "medo", 
        "frustração", "apenas salário", "falta de paixão", "ausência de desafios", "desinteresse", "conformismo", "preguiça", "pouco motivado", "obrigação", "impessoal", 
        "falta de reconhecimento", "sem propósito", "comodismo", "falta de desafios", "imposição", "desgosto", "apatia", "pouca recompensa", "dificuldade", "ausência de propósito"
    ],
    "Quais suas expectativas salariais?": [
        "alto", "demais", "não sei", "exagerado", "absurdo", "irrealista", "desproporcional", "inadequado", "focado em dinheiro", "fora de mercado", 
        "incompatível", "incerto", "excessivo", "especulativo", "falta de clareza", "imprevisível", "inconsistente", "impreciso", "sem noção", "sem fundamento", 
        "elevado", "desproporcional", "exigente", "altíssimo", "desbalanceado", "demasiado", "acima da média", "mal posicionado", "desalinhado", "irresponsável"
    ],
    "Como você se mantém atualizado na sua área?": [
        "não faço", "não sei", "nada", "não atualizo", "não busco", "estagnado", "desinteressado", "sem interesse", "pouco informado", "parado", 
        "acomodado", "indiferente", "desatualizado", "inativo", "falta de curiosidade", "não participo", "pouco envolvido", "falta de iniciativa", "sem inovação", "limitado", 
        "obsoleto", "ausente", "desligado", "despreparado", "sem desenvolvimento", "não busco novidades", "improdutivo", "falta de empenho", "sem capacitação", "não me interesso"
    ],
    "Você tem disponibilidade para viagens?": [
        "não", "difícil", "não quero", "complicado", "impossível", "restrito", "falta de interesse", "indisponível", "inflexível", "desmotivado", 
        "desinteressado", "impraticável", "sem tempo", "pouca disposição", "não gosto", "indiferente", "resistente", "limitado", "impedido", "sem vontade", 
        "impossibilidade", "incapaz", "distância", "longe", "desconfortável", "custoso", "restrição", "não posso", "medo", "falta de apoio"
    ],
    "Por que deveríamos contratar você?": [
        "não sei", "sem motivo", "não faz diferença", "falta de interesse", "não sou qualificado", "indeciso", "não me importa", "pouco relevante", "não tenho diferencial", "não agrego", 
        "falta de preparo", "não sou bom o suficiente", "não estou qualificado", "sem habilidades", "não sou competente", "falta de experiência", "não tenho valor", "não conheço a área", "sem confiança", "desmotivado", 
        "não agrego valor", "não tenho diferencial", "não sou relevante", "não tenho iniciativa", "falta de paixão", "sem interesse", "desorganizado", "não conheço o mercado", "não estou preparado", "sou indiferente"
    ],
    "Você tem alguma pergunta para nós?": [
        "nenhuma", "não", "não importa", "não tenho", "nada", "indiferente", "não pensei nisso", "não me interessa", "não quero saber", "não é relevante", 
        "falta de curiosidade", "sem perguntas", "não vejo necessidade", "sem importância", "não precisa", "sem interesse", "não faço ideia", "não preparei nada", "não pensei em nada", "não conheço o suficiente", 
        "nada a perguntar", "não estou preparado", "falta de interesse", "falta de envolvimento", "não estou seguro", "não pensei nisso", "não tenho dúvidas", "não tenho perguntas", "sem curiosidade", "não faz diferença"
    ]
};

const dicasMelhoria = {
    "baixa": [
        "Tente ser mais claro e focar nas suas habilidades e conquistas.",
        "Considere destacar suas qualidades de maneira mais assertiva.",
        "É importante melhorar sua organização de ideias nas respostas.",
        "Tente evitar usar expressões negativas e destacar o lado positivo das suas experiências.",
        "Melhore sua comunicação, especialmente ao abordar temas delicados.",
        "Desenvolva exemplos mais concretos para ilustrar suas respostas.",
        "Foque em melhorar sua confiança ao responder perguntas desafiadoras.",
        "Evite respostas vagas, seja mais específico nas suas habilidades.",
        "Busque identificar o que você pode trazer de valor à empresa.",
        "Reflita sobre suas motivações para melhorar a clareza nas respostas."
    ],
    "media": [
        "Você fez um bom trabalho, mas pode melhorar ao demonstrar mais confiança em suas respostas.",
        "Tente usar exemplos mais específicos para demonstrar suas habilidades.",
        "Reforce mais o que você pode agregar à empresa com suas qualidades únicas.",
        "Aposte em mostrar como você resolve problemas e lida com desafios.",
        "Tente estruturar suas respostas de forma mais objetiva e clara.",
        "Destaque suas conquistas de forma mais direta e assertiva.",
        "Use mais exemplos práticos para ilustrar seu potencial.",
        "Foque em reforçar a relevância das suas experiências.",
        "Trabalhe sua linguagem corporal e entonação para transmitir mais segurança.",
        "Reflita sobre a empresa e demonstre alinhamento com seus valores."
    ],
    "alta": [
        "Ótimo trabalho! Continue assim, mas não se esqueça de sempre atualizar suas habilidades.",
        "Você está muito bem, mas pode buscar oportunidades de aperfeiçoar suas habilidades técnicas.",
        "Tente diversificar ainda mais suas experiências para aumentar sua competitividade.",
        "Mostre que está sempre em busca de aprendizado contínuo e novas competências.",
        "Parabéns pela excelente comunicação e clareza nas respostas.",
        "Continue desenvolvendo sua capacidade de liderança e proatividade.",
        "Demonstre sempre o impacto positivo das suas ações em resultados concretos.",
        "Seja sempre transparente e coerente ao abordar suas motivações.",
        "Aprimore suas habilidades de negociação e relacionamento interpessoal.",
        "Destaque seu interesse em crescer junto com a empresa a longo prazo."
    ]
};


// Variáveis de controle
let indicePergunta = 0;
let respostas = [];
let pontuacao = 0;

// Inicia a entrevista
function iniciarEntrevista() {
    const perfil = document.getElementById("perfil").value;
    console.log("Valor do perfil selecionado:", perfil);

    if (perfil !== "") {
        document.getElementById("intro").style.display = "none";
        document.getElementById("perguntas").style.display = "block";
        mostrarPergunta();
    } else {
        alert("Por favor, selecione um perfil de entrevistador.");
    }
}

// Mostra a pergunta atual
function mostrarPergunta() {
    document.getElementById("perguntaAtual").innerText = perguntas[indicePergunta];
}

// Avança para a próxima pergunta
function proximaPergunta() {
    const resposta = document.getElementById("resposta").value.toLowerCase();
    if (resposta) {
        respostas.push(resposta);
        avaliarResposta(perguntas[indicePergunta], resposta);
        document.getElementById("resposta").value = "";  // Limpa o campo de resposta

        indicePergunta++;
        if (indicePergunta < perguntas.length) {
            mostrarPergunta();
        } else {
            finalizarEntrevista();
        }
    } else {
        alert("Por favor, insira sua resposta.");
    }
}

// Avalia a resposta com base nas palavras-chave
function avaliarResposta(pergunta, resposta) {
    const positivas = palavrasChavePositivas[pergunta];
    const negativas = palavrasChaveNegativas[pergunta];

    positivas.forEach(palavra => {
        if (resposta.includes(palavra)) {
            pontuacao += 10;
        }
    });

    negativas.forEach(palavra => {
        if (resposta.includes(palavra)) {
            pontuacao -= 5;
        }
    });
}

// Finaliza a entrevista e mostra o resultado
function finalizarEntrevista() {
    document.getElementById("perguntas").style.display = "none";
    document.getElementById("resultado").style.display = "block";
    avaliarEntrevista();
}

// Avaliação final com pontuação de 0 a 10 e dicas de melhoria
function avaliarEntrevista() {
    const maxPontuacao = perguntas.length * 10;  // Pontuação máxima (10 pontos por pergunta)
    const pontuacaoFinal = (pontuacao / maxPontuacao) * 10;  // Escala de 0 a 10
    let feedback = `Sua pontuação final é: ${pontuacaoFinal.toFixed(1)} de 10.`;

    let nivel;
    if (pontuacaoFinal >= 8) {
        nivel = "alta";
    } else if (pontuacaoFinal >= 5) {
        nivel = "media";
    } else {
        nivel = "baixa";
    }

    feedback += "\nDicas para melhorar:";
    const dicas = getDicasAleatorias(dicasMelhoria[nivel]);
    dicas.forEach(dica => {
        feedback += `\n- ${dica}`;
    });

    document.getElementById("feedback").innerText = feedback;
}

// Gera dicas aleatórias para o usuário
function getDicasAleatorias(dicas) {
    const dicasSelecionadas = [];
    while (dicasSelecionadas.length < 2) {  // Seleciona 2 dicas diferentes
        const dica = dicas[Math.floor(Math.random() * dicas.length)];
        if (!dicasSelecionadas.includes(dica)) {
            dicasSelecionadas.push(dica);
        }
    }
    return dicasSelecionadas;
}

// Reinicia a entrevista
function reiniciar() {
    indicePergunta = 0;
    respostas = [];
    pontuacao = 0;
    document.getElementById("intro").style.display = "block";
    document.getElementById("perguntas").style.display = "none";
    document.getElementById("resultado").style.display = "none";
}
