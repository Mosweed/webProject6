<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <section>
        <div class="container-md">
            <div class="row mt-5 pt-4">
                <div class="col-12">
                    <h2>
                        Een beetje over <span class="green">Groene</span> Vingers
                    </h2>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-5">
                    <p class="about-content">
                        Welkom bij Groene Vingers, uw one-stop-shop voor alles wat u nodig heeft voor uw tuin! Wij zijn een bedrijf met meerdere locaties in heel Nederland en bieden ook onze producten aan via onze e-commerce website. Of u nu een gepassioneerde tuinier bent of net begint met het onderhouden van uw tuin, bij Groene Vingers hebben we alles wat u nodig heeft.
                        <br><br>
                        We zijn begonnen als een klein familiebedrijf dat zich richtte op het kweken van planten, maar zijn uitgegroeid tot een van de meest toonaangevende bedrijven op het gebied van tuinbenodigdheden en -producten. Bij Groene Vingers geloven we dat de schoonheid van de natuur en het onderhoud van de omgeving essentieel zijn voor een gezonde levensstijl en een gelukkig leven.
                        <br><br>
                        
                    </p>
                </div>
                <div class="col-md-7">
                    <div class="hero-image">
                        <img src="images/hero.png">
                    </div>
                </div>
                <div class="col-md-12">
                    <p class="about-content">
                    Ons assortiment omvat alles wat u nodig heeft voor uw tuin, of het nu gaat om planten, bloemen, bomen, graszoden of tuinbenodigdheden zoals gereedschap, potgrond, meststoffen en meer. We bieden producten van hoge kwaliteit tegen betaalbare prijzen en we zijn er trots op dat we onze klanten de beste service bieden.
                        <br><br>
                        Bij Groene Vingers hebben we een passie voor tuinieren en willen we deze passie graag delen met onze klanten. We bieden regelmatig workshops en evenementen aan waar u meer kunt leren over tuinieren en uw eigen groene ruimte kunt creëren.
                        <br><br>
                        Ons team van experts staat altijd klaar om u te helpen bij het maken van de juiste keuze voor uw tuinbehoeften en om al uw vragen te beantwoorden. Ons doel is om u te helpen uw eigen paradijs te creëren, of het nu een kleine patio is of een uitgestrekte tuin.
                        <br><br>
                        We zijn er trots op dat we een bedrijf zijn dat zich inzet voor duurzaamheid en het milieu. We streven ernaar om onze impact op het milieu te minimaliseren door het gebruik van duurzame producten en verpakkingen en het verminderen van onze CO2-uitstoot.
                        <br><br>
                        Dus, als u op zoek bent naar alles wat u nodig heeft voor uw tuin, dan bent u bij Groene Vingers aan het juiste adres! We kijken ernaar uit om u te helpen uw eigen groene ruimte te creëren.
                    </p>
                </div>
            </div>
        </div>
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php /**PATH D:\School\pro\Nieuwe map\Projact6\GV-site\resources\views/aboutus.blade.php ENDPATH**/ ?>