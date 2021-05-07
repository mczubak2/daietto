<footer class="footer">
  <div class="footer__inner">
    <div class="container">
      <div class="footer__main">
        <div class="footer__mainRow">
          <div class="footer__menuOuter row">
            <div class="footer__menuInner col-11 col-mdl-12">
              <?php if ($items = apply_filters('wpf_menu', [], 'footer_nav')) : ?>
                <div class="footer__menu">
                  <ul class="footer__menuItems">
                    <?php foreach ($items as $item) : ?>
                      <li class="footer__menuItem <?= ($item['children']) ? 'footer__menuItem--hasChildren' : ''; ?>">
                        <a
                          href="<?= $item['url']; ?>"
                          target="<?= $item['target']; ?>"
                          class="footer__menuItemLink <?= ($item['active']) ? 'footer__menuItemLink--active' : ''; ?>"
                        >
                          <span class="footer__menuItemText" data-text="<?= $item['title']; ?>">
                            <?= $item['title']; ?>
                          </span>
                        </a>
                        <ul class="footer__submenu">
                          <?php foreach ($item['children'] as $item) : ?>
                            <li class="footer__submenuItem">
                              <a
                                href="<?= $item['url']; ?>"
                                target="<?= $item['target']; ?>"
                                class="footer__menuItemLink footer__menuItemLink--submenu <?= ($item['active']) ? 'footer__menuItemLink--active' : ''; ?>"
                                data-text="<?= $item['title']; ?>"
                              >
                                <span class="footer__menuItemText footer__menuItemText--submenu" data-text="<?= $item['title']; ?>">
                                  <?= $item['title']; ?>
                                </span>
                              </a>
                            </li>
                          <?php endforeach; ?>
                        </ul>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="footer__mainRow">
          <div class="footer__mainBottom row">
            <ul class="footer__columns footer__columns--newsletter col-11 col-mdl-12">
              <li class="footer__column footer__column--newsletter">
                <div class="footer__newsletter" style="display: none;">
                  <h5 class="footer__newsletterTitle"><?= get_field('footer_newsletter_title', 'options'); ?></h5>
                  <div class="footer__newsletterForm">
                    <?php do_action('wpf_forms_load', get_field('footer_newsletter_form', 'options')); ?>
                  </div>
                </div>
              </li>
              <li class="footer__column footer__column--socials">
              <?php if ($icons = get_field('footer_socials', 'options')) : ?>
                <div class="footer__socialsWrapper">
                  <h5 class="footer__socialsTitle"><?= __('Follow us', 'lang'); ?></h5>
                  <ul class="footer__socials">
                    <?php foreach ($icons as $icon) : ?>
                      <li class="footer__social">
                        <a href="<?= $icon['url']; ?>" target="_blank"
                          class="footer__socialLink icon-<?= $icon['icon']; ?>"></a>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              <?php endif; ?>
              </li>
            </ul>
          </div>
        </div>
        <div class="footer__bottomRow">
          <div class="row">
            <div class="footer__bottomWrapper col-11 col-mdl-12">
              <div class="footer__bottom">
                <div class="footer__text">
                  <?php if (is_array($logos = get_field('footer_logos', 'options'))) : ?>
                  <div class="footer__bottomLogos">
                    <?php foreach ($logos as $logo) : ?>
                    <?php
                      $srcset = ''  ;
                      if (is_array($logo['image_2x'])) {
                        $srcset = ' srcset="' . $logo['image']['url'] . ', ' . $logo['image_2x']['url'] . ' 2x"';
                      }
                      $maxWidth = '';
                      if ($logo['max_width'] != '0') {
                        $maxWidth = ' style="max-width: ' . $logo['max_width'] . 'px"';
                      }
                    ?>
                    <a
                      href="<?= $logo['link'] ?>"
                      target="_blank"
                      rel="noopener"
                      class="footer__bottomLogo"
                      <?= $maxWidth ?>
                    >
                      <img
                        <?= $srcset ?>
                        src="<?= $logo['image']['url'] ?>"
                        alt="<?= $logo['image']['alt'] ?>"
                      />
                    </a>
                    <?php endforeach; ?>
                  </div>
                  <?php endif; ?>
                  <div class="footer__copy">
                    <?= get_field('footer_bottom', 'options'); ?>
                  </div>
                </div>
                <?php if ($items = apply_filters('wpf_menu', [], 'bottom_nav')) : ?>
                  <div class="footer__bottomMenu">
                    <ul class="footer__bottomMenuItems">
                      <?php foreach ($items as $item) : ?>
                        <li class="footer__bottomMenuItem">
                          <a
                            href="<?= $item['url']; ?>"
                            target="<?= $item['target']; ?>"
                            class="footer__bottomMenuItemLink <?= ($item['active']) ? 'footer__bottomMenuItemLink--active' : ''; ?>"
                          >
                            <span class="footer__bottomMenuItemText" data-text="<?= $item['title']; ?>">
                              <?= $item['title']; ?>
                            </span>
                          </a>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>