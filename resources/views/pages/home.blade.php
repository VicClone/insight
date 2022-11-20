@extends('layouts.app')

@section('content')
    <section class="masthead text-center text-white">
        <div class="masthead-content">
            <div class="container home-banner">
                <div class="home-banner__magazines">
                    <div id="carouselHome" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($promo as $key => $promoItem)
                                <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                                    <div class="home-carousel">
                                        <div class="home-carousel__preview">
                                            <img
                                                src="/storage/images/{{$promoItem->img}}"
                                                class="home-carousel__preview-img d-block"
                                                alt="{{$promoItem->name}}"
                                            >
                                        </div>
                                        <div class="home-carousel__content">
                                            <h5 class="home-carousel__content-title">
                                                {{$promoItem->name}}
                                            </h5>
                                            <p class="home-carousel__content-text">
                                                {{$promoItem->description}}
                                            </p>
                                            <a
                                                class="home-carousel__content-btn btn btn-secondary rounded-pill mt-3"
                                                href="{{$promoItem->link}}"
                                            >
                                                {{$promoItem->link_name}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-btn carousel-control-prev" type="button" data-bs-target="#carouselHome" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-btn carousel-control-next" type="button" data-bs-target="#carouselHome" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="home-info">
                    <div class="home-info__header">
                        <div class="home-info__logo-rgppu">
                            <img
                                class="home-info__logo-img"
                                src="{{asset('img/rgppu.png')}}"
                                alt="РГППУ"
                            >
                        </div>
                        <div class="home-info__logo-soviet">
                            <img
                                class="home-info__logo-img"
                                src="{{asset('img/sovet.png')}}"
                                alt="Совет молодых ученых"
                            >
                        </div>
                        <span class="home-info__header-number">
                            ISSN 2686-8970
                        </span>
                    </div>
                    <div class="home-magazines">
                        <div class="home-magazines__item">
                            <img
                                class="home-magazines__item-img"
                                src="{{asset('img/magazine1.jpg')}}"
                                alt="Журнал 1"
                            >
                        </div>
                        <div class="home-magazines__item">
                            <img
                                class="home-magazines__item-img"
                                src="{{asset('img/magazine3.jpg')}}"
                                alt="Журнал 3"
                            >
                        </div>
                        <div class="home-magazines__item">
                            <img
                                class="home-magazines__item-img"
                                src="{{asset('img/magazine4.jpg')}}"
                                alt="Журнал 4"
                            >
                        </div>
                        <div class="home-magazines__item">
                            <img
                                class="home-magazines__item-img"
                                src="{{asset('img/magazine2.jpg')}}"
                                alt="Журнал 2"
                            >
                        </div>
                    </div>
                    <p class="home-registration">
                        Св-во о рег-ции в Роскомнадзоре: ПИ № ФС 77-77633 от 31.12.2019 г.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="row about" id="about">
            <div class="about__layout col-md-12">
                <div class="about__info">
                    <div class="about__сhief-editor">
                        <img
                            class="about__сhief-editor-avatar"
                            src="{{asset('img/сhiefEditor.jpg')}}"
                            alt="Главный редактор"
                        >
                        <p class="about__сhief-editor-position">Главный редактор</p>
                        <p class="about__сhief-editor-name">
                            <a
                                href="{{ route('chiefEditor') }}"
                                class="staff__name"
                            >
                                Коновалов Антон Андреевич
                            </a>
                        </p>
                    </div>
                    <h2 class="featurette-heading about__heading">Уважаемые читатели!</h2>
                    <div class="base-text">
                        <p>
                            Представляем вам журнал молодых ученых «Инновационная научная современная академическая исследовательская траектория (ИНСАЙТ)», созданного советом молодых ученых Российского государственного профессионально-педагогического университета.
                        </p>
                        <p>
                            Каждый номер нашего журнала постатейно размещается в библиографической базе данных публикаций российских авторов, расположенной в составе интегрированного научного информационного ресурса eLIBRARY.ru
                        </p>
                        <p>
                            Журнал выходит в свет в год 100-летия системы профессионально-педагогического образования России, что очень символично. Профессионально-педагогическое образование как никогда актуально и имеет особое значение в общей системе профессионального образования страны в целом.
                        </p>
                        <p>
                            Цель нашего издания – освещение с точки зрения молодых ученых вопросов, проблем, тенденций развития педагогического, профессионально-педагогического образования, а также связанных с ними таких сфер, как экономика, психология, социология.
                        </p>
                        <p>
                            Сегодня в России наступает эра «перезагрузки» сферы образования, в том числе профессионально-педагогического. И это ставит перед всеми участниками образовательного и научного процесса амбициозную задачу – показать, какой именно должна быть национальная политика в этой области. Естественно, что молодые ученые должны стать активными участниками, а также творцами происходящих и будущих преобразований.
                        </p>
                        <p>
                            Мы уверены, что журнал «ИНСАЙТ» будет эффективным центром научной интеграции замыслов, намерений молодых специалистов, студентов, преподавателей, а так¬же реальным инструментом продвижения новых, свежих, актуальных идей и решений.
                        </p>
                        <p>
                            Журнал – это место для научного творчества и в то же время дискуссионная площадка для обсуждения практикоориентированных и теоретических исследований молодых ученых РГППУ и других вузов. Это новое профессиональное коммуникативное пространство, где представители молодого поколения могут смело высказывать свою точку зрения на современные проблемы педагогики, профессионального образования и другие не менее актуальные темы. Благодаря этому молодые ученые не только станут полноправными участниками профессионального сообщества, но и определят динамику его развития.
                        </p>
                        <p>
                            Мы уверены, что опубликованные на страницах издания статьи, раскрывающие взгляды и идеи начинающих ученых, подкрепленные опытом и научными изысканиями более старших коллег, станут своего рода локомотивом для вывода современной российской науки на качественно новый уровень.
                        </p>
                    </div>
                </div>
                <div class="about__preview">
                    <div class="about__index">
                        <a class="about__index-link" href="https://elibrary.ru/title_about.asp?id=74698" target="_blank">
                            <img class="about__index-img" src="{{asset('img/rinc.jpg')}}" alt="index">
                        </a>
                        <a
                            class="about__index-link"
                            href="https://cyberleninka.ru/journal/n/innovatsionnaya-nauchnaya-sovremennaya-akademicheskaya-issledovatelskaya-traektoriya?i=1080368"
                            target="_blank"
                        >
                            <img class="about__index-img" src="{{asset('img/ciberlenica.jpg')}}" alt="index">
                        </a>
                        <a
                            class="about__index-link"
                            href="https://cyberleninka.ru/journal/n/innovatsionnaya-nauchnaya-sovremennaya-akademicheskaya-issledovatelskaya-traektoriya?i=1080368"
                            target="_blank"
                        >
                            <img class="about__index-img" src="{{asset('img/crossref.jpg')}}" alt="index">
                        </a>
                        <a
                            class="about__index-link"
                            href="https://www.ural-press.ru/catalog/97266/8696564/?sphrase_id=382220"
                            target="_blank"
                        >
                            <img class="about__index-img" src="{{asset('img/ural-press.gif')}}" alt="index">
                        </a>
                    </div>
                    <div class="popular-articles">
                        <h3 class="popular-articles__title">Популярные статьи</h3>
                        <ul class="popular-articles__list list-group">
                            @foreach ($articles as $article)
                                <li class="list-group-item popular-articles__list-item">
                                    <a class="popular-articles__link" href="{{ route('article', $article->id) }}">
                                        <p class="popular-articles__name">{{$article->name}}</p>
                                        <p class="popular-articles__number">
                                            № {{$article->number}} {{$article->year}} год
                                        </p>
                                        <p class="popular-articles__authors">
                                            {{$article->authors}}
                                        </p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <p class="lead about__lead">
                    Призываем и приглашаем к сотрудничеству всех ученых, интересующихся указанными проблемами.
                </p>
            </div>
        </div>

        <h2 class="base-title-2" id="staff">
            Редакционная коллегия
        </h2>
        <div class="staff-container">
            <button type="button" class="staff__btn staff__btn-prev">
                <img
                    class="staff__btn-icon"
                    src="{{asset('img/icons/arrow_back.svg')}}"
                    alt="next"
                >
            </button>
            <button type="button" class="staff__btn staff__btn-next">
                <img
                    class="staff__btn-icon"
                    src="{{asset('img/icons/arrow_forward.svg')}}"
                    alt="next"
                >
            </button>
            <div class="staff">
                @foreach ($team as $item)
                    <div class="col-lg-2 staff__item">
                        <div class="staff__avatar">
                            <img
                                class="staff__avatar-img"
                                src="/storage/images/{{$item->img}}"
                                alt="{{$item->name}}"
                            >
                        </div>
                        <div>
                            <a
                                href="{{$item->link}}"
                                class="staff__name"
                                target="_blank"
                            >
                                {{$item->name}}
                            </a>
                        </div>
                        <p class="staff__desc">
                            {{$item->position}}<br>
                            @if ($item->show_interview == 1)
                                <a class="base-link" href="{{ route('interview', $item->id) }}">
                                    Читать интервью
                                </a>
                            @endif
                        </p>
                    </div>
                @endforeach
            </div>
        </div>


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette" id="recommendation">
            <div class="col-md-12 order-md-2">
                <h2 class="base-title-2">Рекомендации для авторов</h2>
                <div class="double-list">
                    <div class="double-list__item">
                        <p class="double-list__title">
                            Наш научный журнал принимает материалы для публикации по следующим <span class="primary bold">направлениям:</span>
                        </p>
                        <ul class="double-list__list">
                            <li class="double-list__list-item">
                                педагогические науки;
                            </li>
                            <li class="double-list__list-item">
                                психология;
                            </li>
                            <li class="double-list__list-item">
                                экономика, экономические науки.
                            </li>
                        </ul>
                    </div>

                    <div class="double-list__item second">
                        <p class="double-list__title">
                            В журнале будут представлены такие <span class="primary bold">рубрики:</span>
                        </p>
                        <ul class="double-list__list">
                            <li class="double-list__list-item">
                                Профессионально-педагогическое образование: методология и тенденции развития;
                            </li>
                            <li class="double-list__list-item">
                                Методика педагогического образования;
                            </li>
                            <li class="double-list__list-item">
                                Цифровизация образования;
                            </li>
                            <li class="double-list__list-item">
                                Психологические исследования;
                            </li>
                            <li class="double-list__list-item">
                                Социологические и социально-экономические исследования;
                            </li>
                            <li class="double-list__list-item">
                                Междисциплинарные исследования;
                            </li>
                            <li class="double-list__list-item">
                                Научный старт;
                            </li>
                        </ul>
                    </div>
                </div>

                <p class="lead">
                    Редакция рекомендует авторам придерживаться при оформлении публикаций следующих <span class="primary bold">требований:</span>
                </p>
                <ol class="base-list">
                    <li>
                        <p class="base-list__text">
                            Статьи должны освещать результаты исследований и (или) практический опыт и содержать информацию,
                            открытую для печати и представляющую научный и практический интерес.
                            Каждая статья должна обладать научной новизной.
                        </p>
                        <p class="base-list__text">
                            Содержание статьи должно включать следующие <span class="bold">обязательные элементы</span>
                            актуальность (в т.ч. ответы на вопросы: чем статья будет интересна научному сообществу; какой вклад вносит в науку),
                            цель и исследовательские вопросы (для обзорных и теоретических статей обязательна гипотеза),
                            обзор литературы, методы и подход к исследованию,
                            результаты исследования и заключение (ответы на поставленные вопросы).
                        </p>
                        <p class="base-list__text">
                            Авторы несут ответственность за оригинальность представленных к пу­бли­ка­ции статей,
                            за отсутствие в них заимствований, достоверность приводимых фактов,
                            ста­тистических данных, имен собственных, географических названий и прочих све­де­ний.
                            Рекомендуется учитывать, что все статьи, поступающие в журнал, проходят рецензирование и проверку на оригинальность.
                        </p>
                        <p class="base-list__text">
                            Объем статьи должен составлять от 10 до 20 тыс. знаков (с пробелами), включая аннотацию и список литературы.
                        </p>
                    </li>
                    <li>
                        <p class="base-list__text">
                            В состав статьи необходимо включать:
                        </p>
                        <ul>
                            <li>
                                <p class="base-list__text">
                                    тип статьи (научная статья, обзорная статья, редакционная статья, дискуссионная статья,
                                    персоналии, редакторская заметка, рецензия на книгу, рецензия на статью, спектакль и т. п.);
                                </p>
                            </li>
                            <li>
                                <p class="base-list__text">
                                    УДК;
                                </p>
                            </li>
                            <li>
                                <p class="base-list__text">
                                    doi: 10.17853/2686-8970-202х-…;
                                </p>
                            </li>
                            <li>
                                <p class="base-list__text">
                                    название <i class="primary">на русском (не более 12 слов) и английском языках</i>.
                                    Формулировка названия должна быть информативной и привлекательной:
                                    необходимо, чтобы она кратко, но точно отражала содержание, тематику и результаты проведенного исследования, а также его уникальность;
                                </p>
                            </li>
                            <li>
                                <p class="base-list__text">
                                    аннотацию (Abstract) объемом до 500 п.з. <i class="primary">на русском и английском языках</i>.
                                    Аннотация — сжатое реферативное изложение содержания публикации, содержащее структурные части
                                    (введение, цель, методология и методы, результаты, научная новизна и практическая значимость);
                                </p>
                            </li>
                            <li>
                                <p class="base-list__text">
                                    ключевые слова (Keywords) <i class="primary">на русском и английском языках</i>. Ключевые слова — инструмент поиска информации потенциальными читателями статьи,
                                    поэтому перечень таких слов должен быть полным и одновременно лаконичным (5 – 7 слов или словосочетаний) и точным;
                                </p>
                            </li>
                            <li>
                                <p class="base-list__text">
                                    библиографическая запись для цитирования (For citation): дается библиографическое описание статьи;
                                </p>
                            </li>
                            <li>
                                <p class="base-list__text">
                                    Компоновка текста осуществляется следующим образом: сначала указываются все вышеназванные элементы на русском языке,
                                    ниже в таком же порядке — на английском (для статей на английском языке порядок обратный — сначала англоязычный вариант,
                                    потом следует его аналог на русском языке);
                                </p>
                            </li>
                            <li>
                                <p class="base-list__text">
                                    заголовки должны быть выделены любым способом;
                                </p>
                            </li>
                            <li>
                                <p class="base-list__text">
                                    таблицы должны быть представлены в формате MS Word для Windows и обязательно иметь заголовки;
                                </p>
                            </li>
                            <li>
                                <p class="base-list__text">
                                    рисунки должны иметь подрисуночную подпись.
                                    Схемы дожны быть набраны в MS Word (если нет возможности набрать в программе Visio, которая входит в пол­ный пакет Microsoft);
                                    фотографии должны быть отсканированы с хорошим раз­ре­ше­нием (300 точек на дюйм) и не только внедрены в файл,
                                    но и предоставлены от­дель­ным графическим файлом в формате *.jpg, *.tif, *.png, графики (диаграммы) должны быть подкреплены оригинальным файлом MS Exel;
                                </p>
                            </li>
                            <li>
                                <p class="base-list__text">
                                    после основного текста статьи приводят на языке текста статьи и затем повторяют на английском языке следующие элементы издательского оформления:
                                    дополнительные сведения об авторе (авторах),
                                    сведения о вкладе каждого автора,
                                    указание об отсутствии или наличии конфликта интересов и детализация такого конфликта в случае его наличия
                                    (для статей на английском языке порядок обратный — сначала англоязычный вариант, потом следует его аналог на русском языке).
                                </p>
                            </li>
                            <li>
                                <p class="base-list__text">
                                    список источников должен содержать все цитируемые в тексте работы в порядке цитирования (упоминания).
                                    При ссылке на источник в тексте приводится порядковый номер работы
                                    по списку литературы в квадратных скобках и через запятую — номер страницы,
                                    на которой содержится цитируемый фрагмент, например [1, с. 15].
                                    Список литературы приводится на русском языке, в соответствии с тре­бо­ва­ниями ГОСТ Р 7.0.5 – 2008.
                                    Список литературы должен содержать не менее <i class="primary">15 источников</i>,
                                    из которых <i class="primary">не менее 50%</i> опубликованы в <i class="primary">последние 5 лет, 30% – иностранные</i>.
                                    Запрещено цитирование в виде перечисления работ. Каждая ссылка должна быть обоснована контекстом.<br>
                                    Статьи представляются в электронной версии в виде файла формата MS Word для Windows (*.doc) по электронной почте на адрес: Insight rsvpu@mail.ru.
                                    Название файла должно состоять из фамилии автора и названия статьи.
                                </p>
                            </li>
                        </ul>
                        <div class="d-flex sample">
                            <a class="sample__btn btn btn-secondary base-btn mx-auto my-2 rounded-pill" href="/storage/sampleInsight.pdf" target="_blank">
                                Образец оформления статьи ИНСАЙТ
                            </a>
                        </div>
                    </li>
                    <li>
                        <p class="base-list__text">
                            Авторы несут ответственность за оригинальность представленных к публикации статей, за отсутствие в них заимствований, достоверность приводимых фактов, статистических данных, имен собственных, географических названий и прочих сведений;
                        </p>
                    </li>
                    <li>
                        <p class="base-list__text">
                            Рекомендуется учитывать, что все статьи, поступающие в журнал, проходят рецензирование и проверку на оригинальность;
                        </p>
                    </li>
                    <li>
                        <p class="base-list__text">
                            Статьи представляются в электронной версии в виде файла формата MS Word для Windows (*.doc) по электронной почте на адрес: Insight.rsvpu@mail.ru. Название файла должно состоять из фамилии автора и названия статьи.
                        </p>
                        <p class="base-list__text">
                            Отдельными файлами направляются:
                        </p>
                        <ul>
                            <li>
                                <p class="base-list__text">
                                    <a class="base-link" href="/storage/application_for_publication.docx" download>заявление о публикации</a>
                                    произведения и передаче прав на него, включающее также согласие на обработку персональных данных и использование изображения;
                                </p>
                            </li>
                            <li>
                                <p class="base-list__text">
                                    портретная фотография автора на светлом фоне с хорошим разрешением (300 точек на дюйм).
                                </p>
                            </li>
                        </ul>
                    </li>
                </ol>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette" id="rules">
            <div class="col-md-12">
                <h2 class="base-title-2">Правила рецензирования</h2>
                <div class="base-text">
                    <p>
                        Рецензия — оценочный анализ научной статьи, поступившей для публикации в научный журнал «ИНСАЙТ», являющаяся самостоятельным письменным научным произведением, выполненным специалистами той же предметной области, к которой относится и автор рецензируемого произведения. В рецензии главным являются анализ достоинств и недостатков материала, краткое воспроизведение взглядов автора материала и научно обоснованное отношение рецензента к основным идеям автора, их интерпретация в соответствии с убеждениями рецензента.
                    </p>
                    <p>
                        Рецензия обязательна как основной документ экспертизы, проводимой редакцией для определения соответствия материала научно-тематической направленности журнала. Рецензирование помогает главному редактору при принятии решения об опубликовании работы, а автору через связь с редакцией может помочь улучшить свою работу.
                    </p>
                    <p>
                        Рассматривая рецензирование как важнейшее звено в обеспечении обмена научной информацией, редакция уделяет особое внимание подбору рецензентов: квалификация, компетенция, опыт, независимость, оценка выводов должны базироваться на требованиях метода экспертных оценок.
                    </p>
                    <p>
                        Каждый избранный рецензент должен руководствоваться кодексом этики научных публикаций: конфиденциальность, объективность, беспристрастность, ясность и аргументированность выражения своего мнения, соблюдения принципа признания первоисточников, недопустимость взаимного рецензирования. Рецензенты уведомляются о том, что присланные им рукописи являются частной собственностью авторов и относятся к сведениям, не подлежащим разглашению (разглашение сведений статьи до её опубликования возможно только с письменного согласия автора).
                    </p>
                    <p>
                        Автору рецензируемой работы предоставляется возможность ознакомиться с текстом рецензии.
                    </p>
                    <p>
                        Редакционной коллегией журнала разработаны рекомендации по структуре рецензии на научную статью, представленную в редакцию журнала «ИНСАЙТ». Рецензент должен определить соответствие материала, изложенного в статье, профилю и тематике журнала; кратко описать проблему, которой посвящена статья; оценить степень актуальности, оригинальности и значимости полученных результатов, соответствия современным достижениям научно-теоретической мысли, доступности с точки зрения языка, стиля, расположения материала, наглядности таблиц, диаграмм, рисунков и формул, целесообразности с учетом ранее выпущенной по данному вопросу литературы; отметить положительные стороны, а также недостатки статьи.
                    </p>
                    <p>
                        Помимо оценки содержания материала должна быть произведена оценка качества изложения материала: объём статьи, наличие и информативность аннотации и ключевых слов на русском и английском языках, наличие списка литературы и сносок в тексте. В заключительной части рецензии дается рекомендация о целесообразности публикации представленной статьи либо о необходимости ее доработки на основании предъявленных замечаний.
                    </p>
                    <p>
                        Если в рецензии на статью имеется указание на необходимость её исправления, то статья направляется автору на доработку. При наличии в рецензии рекомендаций по исправлению и доработке статьи, ответственный секретарь направляет автору текст рецензии с предложением учесть их при подготовке нового варианта статьи или аргументированно (частично или полностью) их опровергнуть.
                    </p>
                    <p>
                        Доработанная (переработанная) автором статья повторно направляется на рецензирование и рассматривается в общем порядке.
                    </p>
                    <p>
                        Статья, не рекомендованная рецензентом к публикации, к повторному рассмотрению не принимается.
                    </p>
                    <p>
                        Положительная рецензия не является достаточным основанием для публикации статьи. Окончательное решение о целесообразности публикации статьи принимается редакцией журнала.
                    </p>
                    <p>
                        Сроки рецензирования в каждом отдельном случае определяются с учетом создания условий для максимально оперативной публикации статьи. Они должны быть достаточны для качественного анализа представленного материала и заранее согласованы с исполнителем.
                    </p>
                </div>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="schedule" id="shedule">
            <h2 class="base-title-2">График выхода журнала</h2>
            <div class="schedule__flex">
                <div class="schedule__item">
                    <p class="schedule__item-title">
                        Выпуск №1
                    </p>
                    <p class="schedule__item-date">
                        Прием материалов:<br>
                        <span class="bold">до 31 января</span>.
                    </p>
                    <p class="schedule__item-date">
                        Дата выхода журнала в свет:<br>
                        <span class="bold">10 марта</span>.
                    </p>
                </div>
                <div class="schedule__item">
                    <p class="schedule__item-title">
                        Выпуск №2
                    </p>
                    <p class="schedule__item-date">
                        Прием материалов:<br>
                        <span class="bold">до 30 апреля</span>.
                    </p>
                    <p class="schedule__item-date">
                        Дата выхода журнала в свет:<br>
                        <span class="bold">10 июня</span>.
                    </p>
                </div>
                <div class="schedule__item">
                    <p class="schedule__item-title">
                        Выпуск №3
                    </p>
                    <p class="schedule__item-date">
                        Прием материалов:<br>
                        <span class="bold">до 15 сентября</span>.
                    </p>
                    <p class="schedule__item-date">
                        Дата выхода журнала в свет:<br>
                        <span class="bold">20 октября</span>.
                    </p>
                </div>
                <div class="schedule__item">
                    <p class="schedule__item-title">
                        Выпуск №4
                    </p>
                    <p class="schedule__item-date">
                        Прием материалов:<br>
                        <span class="bold">до 31 октября</span>.
                    </p>
                    <p class="schedule__item-date">
                        Дата выхода журнала в свет:<br>
                        <span class="bold">20 декабря</span>.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <a href="#home" class="home__btn-top">
        <img
            class="home__btn-top-icon"
            src="{{asset('img/icons/arrow_up.svg')}}"
            alt="up"
        >
    </a>

    <script src="{{ mix('js/home.js') }}"></script>
@endsection
