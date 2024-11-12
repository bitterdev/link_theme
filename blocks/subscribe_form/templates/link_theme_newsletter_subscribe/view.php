<?php /** @noinspection DuplicatedCode */

/**
 * @project:   Simple Newsletter
 *
 * @author     Fabian Bitter (fabian@bitter.de)
 * @copyright  (C) 2023 Fabian Bitter (www.bitter.de)
 * @version    X.X.X
 */

defined('C5_EXECUTE') or die('Access denied');

use Bitter\SimpleNewsletter\Config;
use Bitter\SimpleNewsletter\Entity\Attribute\Key\NewsletterSubscriberKey;
use Bitter\SimpleNewsletter\Error\ErrorList\Formatter\BootstrapFormatter;
use Concrete\Core\Attribute\Form\Renderer;
use Concrete\Core\Captcha\CaptchaInterface;
use Concrete\Core\Error\ErrorList\ErrorList;
use Concrete\Core\Form\Service\Form;
use Concrete\Core\Support\Facade\Application;
use Concrete\Core\Support\Facade\Url;
use Concrete\Core\Validation\CSRF\Token;
use Concrete\Package\SimpleNewsletter\Block\SubscribeForm\Controller;
use HtmlObject\Element;

/** @var Renderer $renderer */
/** @var NewsletterSubscriberKey[] $attributes */
/** @var array $mailingLists */
/** @var string $buttonText */
/** @var bool $displayCaptcha */
/** @var bool $displayTermsOfUse */
/** @var bool $displayPrivacy */
/** @var Controller $controller */
/** @var ErrorList $error */
/** @var string|bool $success */

$app = Application::getFacadeApplication();
/** @var Token $token */
$token = $app->make(Token::class);
/** @var Form $form */
$form = $app->make(Form::class);
/** @var CaptchaInterface $captcha */
$captcha = $app->make(CaptchaInterface::class);
/** @var Config $config */
$config = $app->make(Config::class);

if (!empty($selectedMailingList)) {
    foreach ($mailingLists as $mailingListId => $mailingListLabel) {
        if ($mailingListId !== $selectedMailingList) {
            unset($mailingLists[$mailingListId]);
        }
    }
}

?>

<div class="simple-newsletter-subscribe-block">
    <?php if ($success): ?>
        <script>
            (function ($) {
                $(function () {
                    window.Toastify({
                        text: "<?php echo h($success); ?>",
                        duration: 6000,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "var(--bs-success)",
                            color: "#ffffff"
                        }
                    }).showToast();
                });
            })(jQuery);
        </script>
    <?php endif; ?>

    <?php if ($error->has()) { ?>
        <?php foreach ($error->getList() as $error) { ?>
            <script>
                (function ($) {
                    $(function () {
                        window.Toastify({
                            text: "<?php echo h($error->getMessage()); ?>",
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                            style: {
                                background: "var(--bs-danger)",
                                color: "#ffffff"
                            }
                        }).showToast();
                    });
                })(jQuery);
            </script>
        <?php } ?>
    <?php } ?>

    <div class="simple-newsletter-subscribe-form">
        <form action="<?php echo $controller->getActionURL("subscribe"); ?>" method="post">
            <?php echo $token->output("subscribe_newsletter"); ?>

            <div class="form-group">
                <?php if (count($mailingLists) === 0): ?>
                    <p class="text-muted">
                        <?php /** @noinspection HtmlUnknownTarget */
                        echo t(
                            "No mailing lists available. Please go to the %s and create one.",
                            sprintf(
                                "<a href=\"%s\" target=\"_blank\">%s</a>",
                                Url::to("/dashboard/simple_newsletter/mailing_lists"),
                                t("mailing lists page")
                            )
                        ); ?>
                    </p>
                <?php else: ?>
                    <?php foreach ($mailingLists as $mailingListId => $mailingListLabel): ?>
                        <?php echo $form->hidden("mailingList[" . $mailingListId . "]", $mailingListId); ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <?php echo $form->email("email", ["placeholder" => t("E-Mail")]); ?>

            <?php if (!empty($attributes)) {
                foreach ($attributes as $ak) {
                    /** @noinspection PhpUndefinedMethodInspection */
                    $renderer->buildView($ak)->render();
                }
            } ?>

            <?php if ($displayPrivacy): ?>
                <div class="simple-newsletter-privacy-checkbox">
                    <div class="form-check">
                        <?php echo $form->checkbox("acceptPrivacy", 1, false, ["class" => "form-check-input"]); ?>

                        <label for="acceptPrivacy" class="form-check-label">
                            <?php
                            $privacyPageLinkText = t("privacy policy");

                            $privacyPage = $config->getPrivacyPage();

                            if (!$privacyPage->isError()) {
                                $linkTag = new Element("a");
                                $linkTag->setAttribute("href", (string)Url::to($privacyPage));
                                $linkTag->setAttribute("target", "_blank");
                                $linkTag->setValue($privacyPageLinkText);
                                $privacyPageLinkText = (string)$linkTag;
                            }

                            echo t("I hereby acknowledge that the data collected in this form will be stored for further use and deleted once my inquiry has been processed. Note: You can revoke your consent at any time by drop us an email. See more detailed information on how we use user-data in our %s.", $privacyPageLinkText);
                            ?>
                        </label>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($displayTermsOfUse): ?>
                <div class="simple-newsletter-terms-of-use-checkbox">
                    <div class="form-check">
                        <?php echo $form->checkbox("acceptTermsOfUse", 1, false, ["class" => "form-check-input"]); ?>

                        <label for="acceptTermsOfUse" class="form-check-label">
                            <?php
                            $termsOfUsePageLinkText = t("terms of use");

                            $termsOfUsePage = $config->getTermsOfUsePage();

                            if (!$termsOfUsePage->isError()) {
                                $linkTag = new Element("a");
                                $linkTag->setAttribute("href", (string)Url::to($termsOfUsePage));
                                $linkTag->setAttribute("target", "_blank");
                                $linkTag->setValue($termsOfUsePageLinkText);
                                $termsOfUsePageLinkText = (string)$linkTag;
                            }

                            echo t("I accept the %s.", $termsOfUsePageLinkText);
                            ?>
                        </label>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($displayCaptcha): ?>
                <div class="simple-newsletter-captcha">
                    <?php echo $captcha->display(); ?>

                    <div class="simple-newsletter-captcha-input">
                        <?php echo $captcha->showInput(); ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="simple-newsletter-subscribe-button">
                <?php echo $form->submit("subscribeNewsletter", $buttonText); ?>
            </div>
        </form>
    </div>
</div>