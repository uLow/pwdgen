<?php $types = $this->get('types'); ?>
<div style="width: 100%;">
    <form action="" method="post">
        <div style="margin: 0 auto; width: 300px; padding: 32px 4px 4px 4px; background-color: rgba(0,0,0,0.1);">
            <div style="color: red">
                <?php echo $this->get('error') ?>
            </div>
            <div style="padding: 2px;">
                <label>
                    Password length:
                    <input type="text" name="length" value="<?php echo $this->get('length') ?: 8 ?>" size="2">
                </label>
            </div>
            <div style="padding: 2px; border-top: 1px dashed #aaa;">
                <label>
                    <input type="checkbox" name="types[numbers]" value="1" <?php echo isset($types['numbers']) ? 'checked="checked"' : ''?>>
                    Numbers without 0 and 1
                </label>
            </div>
            <div style="padding: 2px; border-top: 1px dashed #aaa;">
                <label>
                    <input type="checkbox" name="types[big_letters]" value="1" <?php echo isset($types['big_letters']) ? 'checked="checked"' : ''?>>
                    Big letters without O
                </label>
            </div>
            <div style="padding: 2px; border-top: 1px dashed #aaa;">
                <label>
                    <input type="checkbox" name="types[small_letters]" value="1" <?php echo isset($types['small_letters']) ? 'checked="checked"' : ''?>>
                    Small letters without l and o
                </label>
            </div>
            <div style="padding: 12px 4px 4px 4px; text-align: center; border-top: 1px dashed #aaa;">
                <input type="submit" value="Generate">
            </div>
            <div style="margin-top: 24px; text-align: center; font-weight: bold; font-size: 24px;">
                <?php echo $this->get('password') ?>
            </div>
        </div>
    </form>
</div>