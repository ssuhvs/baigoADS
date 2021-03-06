<?php $cfg = array(
    'title'          => $this->lang['common']['page']['opt'] . ' &raquo; ' . $this->lang['common']['page']['chkver'],
    'menu_active'    => "opt",
    'sub_active'     => "chkver",
    'baigoValidator' => 'true',
    'baigoSubmit'    => 'true',
    'pathInclude'    => BG_PATH_TPLSYS . 'console' . DS . 'default' . DS . 'include' . DS,
    'str_url'        => BG_URL_CONSOLE . 'index.php?m=opt&a=chkver'
);

include($cfg['pathInclude'] . 'console_head.php'); ?>

    <ul class="nav nav-pills mb-3">
        <li class="nav-item">
            <a href="<?php echo BG_URL_HELP; ?>index.php?m=console&a=opt#chkver" class="nav-link" target="_blank">
                <span class="badge badge-pill badge-primary">
                    <span class="oi oi-question-mark"></span>
                </span>
                <?php echo $this->lang['mod']['href']['help']; ?>
            </a>
        </li>
    </ul>

    <?php if (isset($this->tplData['latest_ver']['prd_pub']) && $this->tplData['installed_pub'] < $this->tplData['latest_ver']['prd_pub']) { ?>
        <div class="alert alert-warning">
            <span class="oi oi-warning"></span>
            <?php echo $this->lang['mod']['text']['haveNewVer']; ?>
        </div>
    <?php } else { ?>
        <div class="alert alert-success">
            <span class="oi oi-heart"></span>
            <?php echo $this->lang['mod']['text']['isNewVer']; ?>
        </div>
    <?php } ?>

    <form name="opt_chkver" id="opt_chkver">
        <input type="hidden" name="<?php echo $this->common['tokenRow']['name_session']; ?>" value="<?php echo $this->common['tokenRow']['token']; ?>">
        <input type="hidden" name="a" value="chkver">

        <div class="card">
            <div class="card-header">
                <?php echo $this->lang['mod']['label']['installVer']; ?>
            </div>
            <div class="card-body">
                <dl>
                    <dt><?php echo $this->lang['mod']['label']['installVer']; ?></dt>
                    <dd><?php echo BG_INSTALL_VER; ?></dd>
                    <dt><?php echo $this->lang['mod']['label']['pubTime']; ?></dt>
                    <dd><?php echo date(BG_SITE_DATE, $this->tplData['installed_pub']); ?></dd>
                    <dt><?php echo $this->lang['mod']['label']['installTime']; ?></dt>
                    <dd><?php echo date(BG_SITE_DATE . ' ' . BG_SITE_TIMESHORT, BG_INSTALL_TIME); ?></dd>
                </dl>

                <div class="bg-submit-box"></div>
            </div>

            <div class="card-footer">
                <button type="button" class="btn btn-info bg-submit">
                    <span class="oi oi-reload"></span>
                    <?php echo $this->lang['mod']['btn']['chkver']; ?>
                </button>
            </div>
        </div>
    </form>

    <?php if (isset($this->tplData['latest_ver']['prd_pub']) && $this->tplData['installed_pub'] < $this->tplData['latest_ver']['prd_pub']) { ?>
        <div class="card card-warning">
            <div class="card-header">
                <?php echo $this->lang['mod']['label']['latestVer']; ?>
            </div>
            <table class="table">
                <tbody>
                    <tr>
                        <td class="nowrap bg-td-lg"><?php echo $this->lang['mod']['label']['latestVer']; ?></td>
                        <td><?php echo $this->tplData['latest_ver']['prd_ver']; ?></td>
                    </tr>
                    <tr>
                        <td class="nowrap bg-td-lg"><?php echo $this->lang['mod']['label']['pubTime']; ?></td>
                        <td><?php echo date(BG_SITE_DATE, $this->tplData['latest_ver']['prd_pub']); ?></td>
                    </tr>
                    <tr>
                        <td class="nowrap bg-td-lg"><?php echo $this->lang['mod']['label']['announce']; ?></td>
                        <td><a href="<?php echo $this->tplData['latest_ver']['prd_announcement']; ?>" target="_blank"><?php echo $this->tplData['latest_ver']['prd_announcement']; ?></a></td>
                    </tr>
                    <tr>
                        <td class="nowrap bg-td-lg"><?php echo $this->lang['mod']['label']['downUrl']; ?></td>
                        <td><a href="<?php echo $this->tplData['latest_ver']['prd_download']; ?>" target="_blank"><?php echo $this->tplData['latest_ver']['prd_download']; ?></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php }

include($cfg['pathInclude'] . 'console_foot.php'); ?>

    <script type="text/javascript">
    var opts_submit_form = {
        ajax_url: "<?php echo BG_URL_CONSOLE; ?>index.php?m=opt&c=request",
        msg_text: {
            submitting: "<?php echo $this->lang['common']['label']['submitting']; ?>"
        }
    };

    $(document).ready(function(){
        var obj_submit_form       = $("#opt_chkver").baigoSubmit(opts_submit_form);
        $(".bg-submit").click(function(){
            obj_submit_form.formSubmit();
        });
    });
    </script>

<?php include('include' . DS . 'html_foot.php');