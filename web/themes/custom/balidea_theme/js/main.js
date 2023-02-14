/**
 * Attaches the single_datetime behavior.
 *
 * @type {Drupal~behavior}
 */
(function (Drupal, once, drupalSettings) {
    Drupal.behaviors.customButton = {
      attach(context) {
        const bodyelement = once('balidea_feature', 'body', context);
        if (bodyelement.length){
          const title = Drupal.t("Click to see sitename");
          const button = document.createElement('button');
          button.type = 'button';
          button.innerText = title;
          button.className = "btn-sitename";
          bodyelement[0].appendChild(document.body.appendChild(button));
          loadAlert();
        }
      }
    };

    function loadAlert() {
      let btn = document.querySelector(".btn-sitename");
      btn.addEventListener("click", event => {
        alert(drupalSettings.sitename);
      });
    }
  }(Drupal, once, drupalSettings));