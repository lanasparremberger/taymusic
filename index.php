
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicial</title>

    <?php include 'layouts/header.php'?>



    <section class="relative overflow-hidden">
        <div id="carousel" class="flex transition-transform duration-700 ease-in-out">
            <div class="min-w-full flex justify-center items-center">
                <img src="img/carrossel/tsgrammy.jpeg" alt="theerasfinal" class=" object-cover w-full max-h-[500px]">
            </div>
            <div class="min-w-full flex justify-center items-center">
                <img src="img/carrossel/tslovwer.webp" alt="Taylor 2" class=" object-cover w-full max-h-[500px]">
            </div>
            <div class="min-w-full flex justify-center items-center">
                <img src="img/carrossel/tsevermore.jpg" alt="Taylor 3" class=" object-cover w-full max-h-[500px]">
            </div>
            <div class="min-w-full flex justify-center items-center">
                <img src="img/carrossel/tsred.jpg" alt="Taylor 4" class=" object-cover w-full max-h-[500px]">
            </div>
            <div class="min-w-full flex justify-center items-center">
                <img src="img/carrossel/tsfolklore.png" alt="Taylor 4" class=" object-cover w-full max-h-[500px]">
            </div>
            <div class="min-w-full flex justify-center items-center">
                <img src="img/carrossel/tsfearless.webp" alt="Taylor 4" class=" object-cover w-full max-h-[500px]">
            </div>
            <div class="min-w-full flex justify-center items-center">
                <img src="img/carrossel/ts1989.jpg" alt="Taylor 4" class=" object-cover w-full max-h-[500px]">
            </div>
            <div class="min-w-full flex justify-center items-center">
                <img src="img/carrossel/tsevermore.jpeg" alt="Taylor 4" class=" object-cover w-full max-h-[500px]">
            </div>
            <div class="min-w-full flex justify-center items-center">
                <img src="img/carrossel/tsspeaknow.jpeg" alt="Taylor 4" class=" object-cover w-full max-h-[500px]">
            </div>
            <div class="min-w-full flex justify-center items-center">
                <img src="img/carrossel/tstheerasfinal.jpeg" alt="Taylor 4" class=" object-cover w-full max-h-[500px]">
            </div>
        </div>


        <button id="prev"
            class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-pink-500 text-white rounded-full p-2 shadow-lg hover:scale-110 transition ease-in-out ">
            <i class="fa-solid fa-arrow-left w-6 text-[#1F2937] hover:text-sky-200"></i>
        </button>
        <button id="next"
            class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-pink-500 text-white rounded-full p-2 shadow-lg hover:scale-110 transition ease-in-out">
            <i class="fa-solid fa-arrow-right w-6 text-[#1F2937] hover:text-sky-200"></i>
        </button>

    </section>

    <main class="px-6 py-10  leading-relaxed">
        <?php
        if (isset($_SESSION['user'])) {
        ?>
            <div class="flex flex-col items-center justify-center gap-3 mb-6">
                <a class="text-2xl text-purple-300 font-medium hover:underline hover:text-sky-300 hover:scale-105 duration-200"
                    href="perfil.php">Bem-vinda(o) <?php echo $_SESSION['user']; ?>!</a>

                <div class="flex justify-center items-center gap-8">
                    <a id="mscfavform"
                        class="text-xl text-purple-300 font-medium hover:underline hover:text-sky-300 hover:scale-105 duration-200"
                        href="formmsc.php">Nos diga sua música favorita!</a>
                    <a id="mscfavprint"
                        class="text-xl text-purple-300 font-medium hover:underline hover:text-sky-300 hover:scale-105 duration-200"
                        href="mscprint.php">Veja as músicas favoritadas!</a>
                </div>
            </div>

        <?php
        } else {
        ?>
            <div class="flex flex-col items-center justify-center gap-3 mb-6">
                <div class="flex justify-center items-center gap-8">
                    <a id="usuariocad"
                        class="text-xl text-purple-300 font-medium hover:underline hover:text-sky-300 hover:scale-105 duration-200"
                        href="formcad.php">Faça o seu cadastro!</a>
                    <a id="usuariologin"
                        class="text-xl text-purple-300 font-medium hover:underline hover:text-sky-300 hover:scale-105 duration-200"
                        href="logar.php">Entre em sua conta!</a>
                </div>
            </div>
        <?php
        }
        ?>

        </div>
        <div class="text-lg/6 text-justify">
            <h1 id="titulo" class="text-5xl ml-5 mr-5 font-bold text-pink-500 mb-4 text-center tracking-wide ">A Jornada Lírico-Conceitual de Taylor
                Swift:
                Uma Análise Profunda de Sua Discografia</h1>

            <p class="mb-6 ml-8 mr-8 text-2xl text-gray-300">A discografia de Taylor Swift não é apenas um conjunto de álbuns; é
                uma
                narrativa em movimento contínuo, uma cronologia emocional e artística que transcende gêneros e
                épocas.
                Do country adolescente ao pop introspectivo, do folk narrativo ao synth noir, Taylor construiu
                uma
                obra
                cuja coerência está na transformação. Esta análise visa mergulhar, álbum por álbum, faixa por
                faixa,
                nos
                símbolos, narrativas e construções líricas que formam esse vasto universo estético. Cada álbum
                será
                explorado com um olhar literário, simbólico e conceitual — e ao final, terá emergido uma
                tapeçaria
                de
                mais de 400 linhas de poesia, dor, glória, amadurecimento e reinvenção.</p>

            <h2 id="tay" class="text-4xl font-semibold text-purple-400 mt-8 mb-4 ml-5">Taylor Swift (2006) – A
                Juventude
                em
                Primeira Pessoa</h2>

            <p class="mb-6 ml-8 mr-8 text-2xl text-gray-300">O álbum debut de Taylor Swift é um diário sonoro de uma garota que,
                mesmo
                em
                seus primeiros passos, já possuía controle narrativo. Aqui, o violão country se casa com
                melodias
                simples, mas já há complexidade emocional. "Tim McGraw" evoca a lembrança agridoce de um amor de
                verão.
                “Picture to Burn” é vingança adolescente transformada em energia vocal. “Teardrops on My Guitar”
                é o
                arquétipo da invisibilidade emocional, e “Our Song” transforma a rotina em lirismo. A força
                deste
                álbum
                está na escrita sincera: a jovem Swift documenta a si mesma como uma heroína romântica
                cotidiana. Há
                ecos de Sylvia Plath e Emily Dickinson em suas confissões suaves, marcando o início de uma
                poética
                pessoal.</p>

            <h2 id="fea" class="text-4xl font-semibold text-purple-400 mt-8 mb-4 ml-5">Fearless (2008) – Emblema da
                Esperança
                e da Transformação</h2>

            <p class="mb-6 ml-8 mr-8 text-2xl text-gray-300">Em Fearless, Taylor desenvolve sua habilidade de criar mitologias
                sentimentais. “Love Story” é uma reinterpretação pop de Romeu e Julieta, onde a narrativa se
                resolve
                em
                esperança — uma escolha revolucionária na narrativa feminina. “White Horse” revela a ruptura
                desse
                idealismo, provando que a própria Taylor questiona os mitos que constrói. “You Belong With Me” é
                a
                ode à
                garota invisível, enquanto “Fifteen” mergulha na vulnerabilidade da adolescência com um lirismo
                quase
                memorialístico. “The Best Day” transforma relações familiares em ternura nostálgica. Aqui, o
                violão
                ganha textura pop, e o storytelling se intensifica — Fearless é a jovem que dança na chuva, mas
                agora
                com olhos que enxergam além das nuvens.</p>

            <h2 id="spe" class="text-4xl font-semibold text-purple-400 mt-8 mb-4 ml-5">Speak Now (2010) – O Romper de
                Silêncios</h2>

            <p class="mb-6 ml-8 mr-8 text-2xl text-gray-300">Neste álbum, Taylor escreve todas as faixas sozinha, e isso se
                manifesta
                em
                uma coesão lírica extraordinária. “Mine” apresenta um amor maduro interrompido por traumas
                familiares.
                “Back to December” é uma elegia ao arrependimento — notável por inverter o papel clássico da
                vítima.
                “Dear John” é uma carta aberta, quase literária, denunciando o abuso emocional. “Mean” é um hino
                contra
                a crítica destrutiva. “Enchanted” captura a sensação mágica do primeiro encontro, enquanto “Last
                Kiss” é
                quase haicai em seu luto romântico. A estética sonora mistura country polido e baladas de piano.
                Speak
                Now é, talvez, o primeiro álbum de Taylor onde ela escreve com o peso do silêncio e da resposta.
            </p>

            <h2 id="red" class="text-4xl font-semibold text-purple-400 mt-8 mb-4 ml-5">Red (2012) – O Amor Entre o
                Êxtase
                e a
                Ruína</h2>

            <p class="mb-6 ml-8 mr-8 text-2xl text-gray-300">Red é um mosaico emocional. “State of Grace” e “Holy Ground” são hinos
                do
                amor
                em seu esplendor. “All Too Well”, a faixa mais emblemática, é um épico narrativo que transforma
                memórias
                em feridas abertas. “I Knew You Were Trouble” introduz elementos eletrônicos e dubstep,
                indicando a
                coragem de Taylor em reinventar seu som. “The Last Time” e “Sad Beautiful Tragic” são lamentos
                de
                uma
                alma romântica exaurida. O vermelho do título representa paixão, mas também perda, raiva,
                nostalgia.
                Este é o álbum onde a linguagem se expande: metáforas cromáticas, estruturas elípticas,
                fragmentações de
                tempo. Red é o coração despedaçado tentando continuar batendo — um marco emocional e sonoro na
                discografia swiftiana.</p>

            <h2 id="nin" class="text-4xl font-semibold text-purple-400 mt-8 mb-4 ml-5">1989 (2014) – Reinvenção Neon
                e
                Liberdade Sintética</h2>

            <p class="mb-6 ml-8 mr-8 text-2xl text-gray-300">Em 1989, Taylor Swift emerge do casulo da transição para abraçar com
                convicção
                o pop sintético. “Blank Space” desconstrói a imagem midiática da mulher volúvel e perigosa,
                transformando-a numa personagem teatral que narra o ciclo do amor e da autossabotagem. “Style” é
                pulsante, urbana, um retrato do desejo estilizado pela repetição. “Out of the Woods” encapsula
                ansiedade
                emocional através de loops e refrões repetitivos, simbolizando um amor instável. “Clean”, com
                Imogen
                Heap, encerra o álbum como um batismo: o renascimento da identidade após a tempestade emocional.
                A
                estética visual — tons pastéis, polaroides, cabelos ao vento — reforça a aura de nova-iorquina
                livre
                e
                introspectiva. Aqui, Taylor mergulha na linguagem visual e simbólica de sua própria persona:
                tudo é
                meticulosamente pop e, ainda assim, poeticamente sincero.</p>

            <h2 id="rep" class="text-4xl font-semibold text-purple-400 mt-8 mb-4 ml-5">Reputation (2017) – A Morte da
                Coragem
                e o Recomeço da Voz</h2>

            <p class="mb-6 ml-8 mr-8 text-2xl text-gray-300">Com Reputation, Taylor Swift se reinventa mais uma vez — desta vez
                como
                uma
                figura enigmática, sombria e decidida. O álbum lida com a destruição de sua imagem pública após
                escândalos e intrigas midiáticas, mas o faz com inteligência lírica e ironia afiada. “Look What
                You
                Made
                Me Do” satiriza a vingança como performance, enquanto “Delicate” revela vulnerabilidade
                escondida
                sob a
                armadura eletrônica. “Call It What You Want” é uma carta de amor silenciosa em meio ao caos, e
                “New
                Year’s Day” retorna ao piano cru, simbolizando renascimento. A fusão entre trap, synth-pop e R&B
                reflete
                um estado emocional fragmentado, mas em reconstrução. Reputation é o álbum da noite escura da
                alma —
                onde Taylor escolhe sobreviver, reinventar e preparar terreno para o amor.</p>

            <h2 id="lov" class="text-4xl font-semibold text-purple-400 mt-8 mb-4 ml-5">Lover (2019) – O Amor como Ato
                Poético
                e Político</h2>

            <p class="mb-6 ml-8 mr-8 text-2xl text-gray-300">Lover é o álbum da luz após a tempestade. Aqui, Taylor revisita temas
                românticos sob uma ótica mais colorida, madura e engajada. “Cruel Summer” é êxtase e vertigem,
                paixão
                com tintas de perigo. “Lover”, a faixa-título, é quase cerimonial: um voto de amor eterno que se
                revela
                em seus silêncios e compassos suaves. “The Archer” é confissão pura — a dúvida, a insegurança, a
                busca
                por autoaceitação. Já “You Need To Calm Down” e “Miss Americana & the Heartbreak Prince” inserem
                discurso político e social em meio à doçura pop, defendendo minorias e questionando a estrutura
                da
                fama
                e da identidade. O álbum se equilibra entre baladas (“Cornelia Street”) e explosões de brilho
                (“Paper
                Rings”), e revela que o amor, para Taylor, é tão pessoal quanto revolucionário.</p>

            <h2 id="fol" class="text-4xl font-semibold text-purple-400 mt-8 mb-4 ml-5">Folklore (2020) – A Mitologia
                do
                Isolamento e da Imaginação</h2>

            <p class="mb-6 ml-8 mr-8 text-2xl text-gray-300">Folklore é a entrada de Taylor Swift no universo do folk alternativo,
                um
                refúgio lírico criado no silêncio da pandemia. Abandonando a linearidade autobiográfica, ela
                constrói
                arquétipos e narrativas cruzadas, como no triângulo amoroso ficcional entre “cardigan”, “august”
                e
                “betty”. Em “the last great american dynasty”, Taylor reconta a história de Rebekah Harkness
                para
                discutir misoginia, poder e destino feminino — espelhando-se na personagem. “exile”, com Bon
                Iver, é
                um
                duelo entre almas que já se perderam, onde o diálogo é um campo de batalha lírico. O álbum é
                permeado
                por piano, cordas, harmonias sussurradas — quase como se cada faixa fosse um bilhete guardado em
                uma
                caixa de memórias esquecidas. “mirrorball” mostra Taylor como um reflexo dos olhares alheios,
                uma
                performer vulnerável. Folklore é um álbum sobre afastamento e criação: uma tapeçaria emocional
                tecida
                com a linha tênue entre verdade e ficção.</p>

            <h2 id="eve" class="text-4xl font-semibold text-purple-400 mt-8 mb-4 ml-5">Evermore (2020) – O Inverno
                Como
                Continuidade Emocional</h2>

            <p class="mb-6 ml-8 mr-8 text-2xl text-gray-300">Se Folklore é o outono lírico, Evermore é o inverno contemplativo. Com
                estrutura similar, o álbum expande os experimentos folk e mergulha mais fundo em temas como
                solidão,
                obsessão e recomeço. “champagne problems” é uma recusa de pedido de casamento narrada com
                empatia
                brutal, onde a dor da rejeição não é vilania, mas trauma não resolvido. “tolerate it” é o grito
                silencioso de quem ama sem ser visto. “no body, no crime”, com HAIM, evoca o country noir para
                contar
                uma história de assassinato e vingança. Já “marjorie” é um tributo comovente à avó de Taylor,
                misturando
                memórias e conselhos com harmonias espectrais. “cowboy like me” e “gold rush” abordam amores
                fadados
                ao
                fracasso com lirismo econômico. O álbum termina com “evermore”, que, como um poema de inverno,
                sugere
                que a dor é uma estação — mas que, inevitavelmente, passará. Evermore solidifica Taylor como
                cronista de
                pequenas tragédias humanas.</p>

            <h1 id="mid" class="text-4xl font-semibold text-purple-400 mt-8 mb-4 ml-5"> Midnights (2022) – As Horas
                Silenciosas da Confissão e do Caos Interno</h1>
            <p class="mb-6 ml-8 mr-8 text-2xl text-gray-300">Midnights é o álbum do sussurro antes do sono, onde pensamentos
                indomáveis
                ecoam entre batidas eletrônicas e memórias persistentes. Aqui, Taylor Swift mergulha fundo no
                espelho
                noturno da própria mente, revelando fendas, faíscas e fantasmas. “Lavender Haze” abre o disco
                com
                uma
                névoa romântica e protetora, tentando blindar um amor da pressão pública. “Maroon” segue como
                uma
                memória viva, escura e íntima — onde a cor do vinho representa tudo que foi intenso demais para
                durar.
                “Anti-Hero” é talvez a confissão mais direta de sua carreira: Taylor se olha sem filtro, em uma
                ironia
                crua e autocrítica que se transforma em hino de identificação coletiva. Em “Bejeweled”, ela
                reivindica
                brilho mesmo quando subestimada, enquanto “Karma” se torna um conceito dançante e vingativo,
                embalado em
                purpurina.

                A estética do álbum é etérea e urbana, como se o céu da meia-noite se estendesse sobre
                arranha-céus
                e
                corações partidos. “Midnight Rain” traz dualidade e escolhas, enquanto “You're On Your Own, Kid”
                é
                um
                lembrete sutil e brutal da solidão inerente ao crescimento. Com “Sweet Nothing”, Taylor descansa
                no
                afeto simples e seguro; e em “Mastermind”, ela admite o cálculo por trás do destino — revelando
                que,
                por
                vezes, até o amor é uma construção engenhosa.

                Midnights não é um álbum sobre finais felizes ou grandes respostas. É sobre as perguntas que
                sussurramos
                a nós mesmos quando ninguém está olhando. É sobre entender que o caos interno também é parte da
                jornada.
                É o relógio marcando doze para quem não consegue dormir — e transforma insônia em arte.</p>

            <h2 id="the" class="text-4xl font-semibold text-purple-400 mt-8 mb-4 ml-5">The Tortured Poets Department
                (2024) –
                O Manuscrito da Autodestruição e da Transfiguração</h2>

            <p class="mb-6 ml-8 mr-8 text-2xl text-gray-300">O mais recente trabalho, The Tortured Poets Department, é um tratado
                existencial sobre perda, obsessão, ironia e renascimento. Taylor usa a estética de uma antologia
                poética
                para construir um ciclo de desilusões românticas e rituais emocionais. “Fortnight”, com Post
                Malone,
                abre com a urgência de um amor condenado ao fracasso. “The Tortured Poets Department” brinca com
                metalinguagem, apresentando Taylor como uma escritora ciente de sua persona pública, presa entre
                o
                romantismo gótico e o deboche literário. “So Long, London” é um adeus devastador, enquanto “I
                Can Do
                It
                With a Broken Heart” satiriza o culto à performance, à custa do sofrimento pessoal. A linguagem
                é
                repleta de referências literárias, trocadilhos e intertextualidade, como em “But Daddy I Love
                Him” e
                “Clara Bow”. Aqui, Taylor Swift é Sylvia Plath e também Anaïs Nin; é diarista e ficcionista; é
                musa
                e
                narradora. É um álbum feito para ser lido tanto quanto ouvido — uma biblioteca emocional em
                ruínas e
                renascimentos.</p>

            <h2 id="tsv" class="text-4xl font-semibold text-purple-400 mt-8 mb-4 ml-5">As Taylor’s Versions – A
                Reconquista
                do Passado Como Ato Político e Artístico</h2>

            <p class=" ml-8 mr-8 text-2xl text-gray-300">As Taylor’s Versions não são apenas regravações: são reescritas simbólicas
                da
                narrativa de uma artista que recupera sua voz e seu legado. Ao regravar os álbuns dos quais não
                detinha
                os direitos originais, Taylor reivindica seu passado não como algo fossilizado, mas como uma
                construção
                contínua. Cada “From the Vault” revela lados omitidos de histórias já conhecidas: “Nothing New”,
                “Mr.
                Perfectly Fine”, “When Emma Falls in Love” — faixas que ampliam os contornos emocionais dos
                álbuns
                originais. Mais do que nostalgia, os relançamentos trazem novos arranjos, maturidade vocal e uma
                compreensão crítica do próprio passado. Fearless (Taylor’s Version) e Red (Taylor’s Version) são
                especialmente poderosos nesse sentido: um recontar que é, simultaneamente, restauração e
                reimaginação.
                São atos de justiça criativa — Taylor toma o controle do tempo, do som e da história.</p>
        </div>
    </main>
    <footer class="bg-sky-200 text-center text-[#1F2937] py-6 mt-12">
        <p class="mb-2 text-lg">
            <b> &copy; 2025 - Desenvolvido com 💜 por Lana Sparremberger
        </p>
        <p class="mb-2 text-lg">
            Sor me dá nota por favor
        </p>
        <p class="mb-2 text-lg">
            <i> "I gave my blood, sweat and tears for this" </i> - Swift, Taylor (2022)</b>
        </p>
    </footer>
    </div>

    <script>
        const carousel = document.getElementById('carousel');
        const totalSlides = carousel.children.length;
        let currentSlide = 0;


        function updateCarousel() {
            carousel.style.transform = `translateX(-${currentSlide * 100}%)`;
        }

        document.getElementById('next').addEventListener('click', () => {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateCarousel();
        });

        document.getElementById('prev').addEventListener('click', () => {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            updateCarousel();
        });

        setInterval(() => {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateCarousel();
        }, 5000);
    </script>

</body>

</html>