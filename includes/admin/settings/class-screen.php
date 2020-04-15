<?php
/* * * * * * * * * * * * * * * * * * * *
 *  ██████╗ █████╗  ██████╗ ███████╗
 * ██╔════╝██╔══██╗██╔═══██╗██╔════╝
 * ██║     ███████║██║   ██║███████╗
 * ██║     ██╔══██║██║   ██║╚════██║
 * ╚██████╗██║  ██║╚██████╔╝███████║
 *  ╚═════╝╚═╝  ╚═╝ ╚═════╝ ╚══════╝
 *
 * @author   : Daan van den Bergh
 * @url      : https://daan.dev/wordpress-plugins/caos/
 * @copyright: (c) 2020 Daan van den Bergh
 * @license  : GPL2v2 or later
 * * * * * * * * * * * * * * * * * * * */

class CAOS_Admin_Settings_Screen
{
    /** @var string $utm_tags */
    protected $utm_tags = '?utm_source=caos&utm_medium=plugin&utm_campaign=settings';

    /** @var $title */
    protected $title;

    /**
     *
     */
    public function do_before()
    {
        ?>
        <table class="form-table">
        <?php
    }

    public function do_title()
    {
        ?>
        <h3><?= $this->title ?></h3>
        <?php
    }

    /**
     * @param $class
     */
    public function do_tbody_open($class)
    {
        ?>
        <tbody class="<?= $class; ?>" <?= empty(CAOS_OPT_COMPATIBILITY_MODE) ? '' : 'style="display: none;"'; ?>>
        <?php
    }

    public function do_tbody_close()
    {
        ?>
        </tbody>
        <?php
    }

    /**
     *
     */
    public function do_after()
    {
        ?>
        </table>
        <?php
    }

    public function do_select($label, $select, $options, $selected, $description, $update_required = false)
    {
        ?>
        <tr>
            <th scope="row">
                <?= apply_filters($select . '_setting_label', $label); ?> <?= $update_required ? '*' : ''; ?>
            </th>
            <td>
                <select name="<?= $select; ?>" class="<?= str_replace('_', '-', $select); ?>">
                    <?php foreach ($options as $option => $option_label): ?>
                        <option value="<?= $option; ?>" <?= ($selected == $option) ? 'selected' : ''; ?>><?= $option_label; ?></option>
                    <?php endforeach; ?>
                </select>
                <p class="description">
                    <?= apply_filters($select . '_setting_description', $description); ?>
                </p>
            </td>
        </tr>
        <?php
    }

    /**
     * Generate number setting.
     *
     * @param $label
     * @param $name
     * @param $value
     * @param $description
     */
    public function do_number($label, $name, $value, $description, $min = 0)
    {
        ?>
        <tr valign="top">
            <th scope="row"><?= apply_filters($name . '_setting_label', $label); ?></th>
            <td>
                <input class="<?= str_replace('_', '-', $name); ?>" type="number" name="<?= $name; ?>" min="<?= $min; ?>" value="<?= $value; ?>"/>
                <p class="description">
                    <?= apply_filters($name . '_setting_description', $description); ?>
                </p>
            </td>
        </tr>
        <?php
    }

    /**
     * Generate text setting.
     *
     * @param        $label
     * @param        $name
     * @param        $placeholder
     * @param        $value
     * @param string $description
     * @param bool   $update_required
     */
    public function do_text($label, $name, $placeholder, $value, $description = '', $update_required = false)
    {
        ?>
        <tr>
            <th scope="row"><?= apply_filters($name . '_setting_label', $label); ?> <?= $update_required ? '*' : ''; ?></th>
            <td>
                <input class="<?= str_replace('_', '-', $name); ?>" type="text" name="<?= $name; ?>" placeholder="<?= $placeholder; ?>" value="<?= $value; ?>"/>
                <p class="description">
                    <?= apply_filters($name . 'setting_description', $description); ?>
                </p>
            </td>
        </tr>
        <?php
    }

    /**
     * Generate checkbox setting.
     *
     * @param $label
     * @param $name
     * @param $checked
     * @param $description
     */
    public function do_checkbox($label, $name, $checked, $description)
    {
        ?>
        <tr>
            <th scope="row"><?= apply_filters($name . '_setting_label', $label); ?></th>
            <td>
                <input type="checkbox" class="<?= str_replace('_' , '-' , $name); ?>" name="<?= $name; ?>"
                    <?= $checked == "on" ? 'checked = "checked"' : ''; ?> />
                <p class="description">
                    <?= apply_filters($name . '_setting_description', $description); ?>
                </p>
            </td>
        </tr>
        <?php
    }
}
