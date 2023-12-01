<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/custom/cuppies_theme/templates/node.html.twig */
class __TwigTemplate_a1639e579113583db9345111df17f957 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 71
        echo "<article";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 71, $this->source), "html", null, true);
        echo ">

    ";
        // line 73
        if ((((($context["isCart"] ?? null) || ($context["isAccount"] ?? null)) || ($context["isSettings"] ?? null)) || ($context["isOrders"] ?? null))) {
            // line 74
            echo "      <button class=\"back-button\" onclick=\"window.location='main';\" type=\"button\">Return</button>
    ";
        }
        // line 76
        echo "
    ";
        // line 77
        if (($context["isProduct"] ?? null)) {
            // line 78
            echo "      <button class=\"back-button\" onclick=\"window.location='../main';\" type=\"button\">Return</button>
    ";
        }
        // line 80
        echo "
  ";
        // line 81
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 81, $this->source), "html", null, true);
        echo "
  ";
        // line 82
        if ((($context["label"] ?? null) &&  !($context["page"] ?? null))) {
            // line 83
            echo "    <h2";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_attributes"] ?? null), 83, $this->source), "html", null, true);
            echo ">
      <a href=\"";
            // line 84
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null), 84, $this->source), "html", null, true);
            echo "\" rel=\"bookmark\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 84, $this->source), "html", null, true);
            echo "</a>
    </h2>
  ";
        }
        // line 87
        echo "  ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 87, $this->source), "html", null, true);
        echo "

  ";
        // line 89
        if (($context["display_submitted"] ?? null)) {
            // line 90
            echo "    <footer>
      ";
            // line 91
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["author_picture"] ?? null), 91, $this->source), "html", null, true);
            echo "
      <div";
            // line 92
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["author_attributes"] ?? null), 92, $this->source), "html", null, true);
            echo ">
        ";
            // line 93
            echo t("Submitted by @author_name on @date", array("@author_name" => ($context["author_name"] ?? null), "@date" => ($context["date"] ?? null), ));
            // line 94
            echo "        ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["metadata"] ?? null), 94, $this->source), "html", null, true);
            echo "
      </div>
    </footer>
  ";
        }
        // line 98
        echo "
  <div";
        // line 99
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content_attributes"] ?? null), 99, $this->source), "html", null, true);
        echo ">
    ";
        // line 100
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 100, $this->source), "html", null, true);
        echo "
  </div>

    ";
        // line 103
        if (($context["isProduct"] ?? null)) {
            // line 104
            echo "      ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["ProductForm"] ?? null), 104, $this->source), "html", null, true);
            echo "
    ";
        }
        // line 106
        echo "
    ";
        // line 107
        if (($context["isCart"] ?? null)) {
            // line 108
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["CartForm"] ?? null), 108, $this->source), "html", null, true);
            echo "
    ";
        }
        // line 110
        echo "    
    ";
        // line 111
        if (($context["isAccount"] ?? null)) {
            // line 112
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["AccountForm"] ?? null), 112, $this->source), "html", null, true);
            echo "
    ";
        }
        // line 114
        echo "
    ";
        // line 115
        if (($context["isOrders"] ?? null)) {
            // line 116
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["OrdersForm"] ?? null), 116, $this->source), "html", null, true);
            echo "
    ";
        }
        // line 118
        echo "
</article>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/cuppies_theme/templates/node.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  165 => 118,  159 => 116,  157 => 115,  154 => 114,  148 => 112,  146 => 111,  143 => 110,  137 => 108,  135 => 107,  132 => 106,  126 => 104,  124 => 103,  118 => 100,  114 => 99,  111 => 98,  103 => 94,  101 => 93,  97 => 92,  93 => 91,  90 => 90,  88 => 89,  82 => 87,  74 => 84,  69 => 83,  67 => 82,  63 => 81,  60 => 80,  56 => 78,  54 => 77,  51 => 76,  47 => 74,  45 => 73,  39 => 71,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - node: The node entity with limited access to object properties and methods.
 *   Only method names starting with \"get\", \"has\", or \"is\" and a few common
 *   methods such as \"id\", \"label\", and \"bundle\" are available. For example:
 *   - node.getCreatedTime() will return the node creation timestamp.
 *   - node.hasField('field_example') returns TRUE if the node bundle includes
 *     field_example. (This does not indicate the presence of a value in this
 *     field.)
 *   - node.isPublished() will return whether the node is published or not.
 *   Calling other methods, such as node.delete(), will result in an exception.
 *   See \\Drupal\\node\\Entity\\Node for a full list of public properties and
 *   methods for the node object.
 * - label: (optional) The title of the node.
 * - content: All node items. Use {{ content }} to print them all,
 *   or print a subset such as {{ content.field_example }}. Use
 *   {{ content|without('field_example') }} to temporarily suppress the printing
 *   of a given child element.
 * - author_picture: The node author user entity, rendered using the \"compact\"
 *   view mode.
 * - metadata: Metadata for this node.
 * - date: (optional) Themed creation date field.
 * - author_name: (optional) Themed author name field.
 * - url: Direct URL of the current node.
 * - display_submitted: Whether submission information should be displayed.
 * - attributes: HTML attributes for the containing element.
 *   The attributes.class element may contain one or more of the following
 *   classes:
 *   - node: The current template type (also known as a \"theming hook\").
 *   - node--type-[type]: The current node type. For example, if the node is an
 *     \"Article\" it would result in \"node--type-article\". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node--view-mode-[view_mode]: The View Mode of the node; for example, a
 *     teaser would result in: \"node--view-mode-teaser\", and
 *     full: \"node--view-mode-full\".
 *   The following are controlled through the node publishing options.
 *   - node--promoted: Appears on nodes promoted to the front page.
 *   - node--sticky: Appears on nodes ordered above other non-sticky nodes in
 *     teaser listings.
 *   - node--unpublished: Appears on unpublished nodes visible only to site
 *     admins.
 * - title_attributes: Same as attributes, except applied to the main title
 *   tag that appears in the template.
 * - content_attributes: Same as attributes, except applied to the main
 *   content tag that appears in the template.
 * - author_attributes: Same as attributes, except applied to the author of
 *   the node tag that appears in the template.
 * - title_prefix: Additional output populated by modules, intended to be
 *   displayed in front of the main title tag that appears in the template.
 * - title_suffix: Additional output populated by modules, intended to be
 *   displayed after the main title tag that appears in the template.
 * - view_mode: View mode; for example, \"teaser\" or \"full\".
 * - teaser: Flag for the teaser state. Will be true if view_mode is 'teaser'.
 * - page: Flag for the full page state. Will be true if view_mode is 'full'.
 * - readmore: Flag for more state. Will be true if the teaser content of the
 *   node cannot hold the main body content.
 * - logged_in: Flag for authenticated user status. Will be true when the
 *   current user is a logged-in member.
 * - is_admin: Flag for admin user status. Will be true when the current user
 *   is an administrator.
 *
 * @see template_preprocess_node()
 *
 * @ingroup themeable
 */
#}
<article{{ attributes }}>

    {% if isCart or isAccount or isSettings or isOrders %}
      <button class=\"back-button\" onclick=\"window.location='main';\" type=\"button\">Return</button>
    {% endif %}

    {% if isProduct %}
      <button class=\"back-button\" onclick=\"window.location='../main';\" type=\"button\">Return</button>
    {% endif %}

  {{ title_prefix }}
  {% if label and not page %}
    <h2{{ title_attributes }}>
      <a href=\"{{ url }}\" rel=\"bookmark\">{{ label }}</a>
    </h2>
  {% endif %}
  {{ title_suffix }}

  {% if display_submitted %}
    <footer>
      {{ author_picture }}
      <div{{ author_attributes }}>
        {% trans %}Submitted by {{ author_name }} on {{ date }}{% endtrans %}
        {{ metadata }}
      </div>
    </footer>
  {% endif %}

  <div{{ content_attributes }}>
    {{ content }}
  </div>

    {% if isProduct %}
      {{ ProductForm }}
    {% endif %}

    {% if isCart %}
    {{ CartForm }}
    {% endif %}
    
    {% if isAccount %}
    {{ AccountForm }}
    {% endif %}

    {% if isOrders %}
    {{ OrdersForm }}
    {% endif %}

</article>
", "themes/custom/cuppies_theme/templates/node.html.twig", "D:\\wamp64\\www\\cuppies\\web\\themes\\custom\\cuppies_theme\\templates\\node.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 73, "trans" => 93);
        static $filters = array("escape" => 71);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'trans'],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
