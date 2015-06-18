<div class="tile-area no-padding">
    <div class="tile-container ">

    <?php if ($_access == 'admin'): ?>
        <a href="<?= $_url ?>mahasiswa">
        	<div class="tile-large bg-indigo fg-white" data-role="tile">
        			<div class="tile-content iconic">
                    <span class="icon mif-users"></span>
                    </div>
                    <span class="tile-label">MAHASISWA</span>
        	</div>
        </a>
        <a href="<?= $_url ?>dosen">
        	<div class="tile-large bg-crimson fg-white" data-role="tile">
        			<div class="tile-content iconic">
                    <span class="icon mif-users"></span>
                    </div>
                    <span class="tile-label">DOSEN</span>
        	</div>
        </a>
        <a href="<?= $_url ?>matakuliah">
        	<div class="tile bg-emerald fg-white" data-role="tile">
        			<div class="tile-content iconic">
                    <span class="icon mif-books"></span>
                    </div>
                    <span class="tile-label">MATAKULIAH</span>
        	</div>
        </a>
        <a href="<?= $_url ?>program-studi">
        	<div class="tile bg-orange fg-white" data-role="tile">
        			<div class="tile-content iconic">
                    <span class="icon mif-school"></span>
                    </div>
                    <span class="tile-label">PROGRAM STUDI</span>
        	</div>
        </a>
        <a href="<?= $_url ?>krs">
        	<div class="tile bg-lightBlue fg-white" data-role="tile">
        			<div class="tile-content iconic">
                    <span class="icon mif-calendar"></span>
                    </div>
                    <span class="tile-label">KRS</span>
        	</div>
        </a>
        <a href="<?= $_url ?>user">
        	<div class="tile bg-magenta fg-white" data-role="tile">
        			<div class="tile-content iconic">
                    <span class="icon mif-users"></span>
                    </div>
                    <span class="tile-label">USERS</span>
        	</div>
        </a>
    <?php endif; ?>


    <?php if ($_access == 'dosen'): ?>
        <a href="<?= $_url ?>dosen/view/<?= $_username ?>">
        	<div class="tile-wide bg-crimson fg-white" data-role="tile">
        			<div class="tile-content iconic">
                    <span class="icon mif-user"></span>
                    </div>
                    <span class="tile-label">PROFIL DOSEN</span>
        	</div>
        </a>
        <a href="<?= $_url ?>krs">
        	<div class="tile-wide bg-lightBlue fg-white" data-role="tile">
        			<div class="tile-content iconic">
                    <span class="icon mif-calendar"></span>
                    </div>
                    <span class="tile-label">KRS Mahasiswa</span>
        	</div>
        </a>
        <a href="<?= $_url ?>user/change-password">
        	<div class="tile-wide bg-magenta fg-white" data-role="tile">
        			<div class="tile-content iconic">
                    <span class="icon mif-key"></span>
                    </div>
                    <span class="tile-label">CHANGE PASSWORD</span>
        	</div>
        </a>
    <?php endif; ?>


    <?php if ($_access == 'mahasiswa'): ?>
        <a href="<?= $_url ?>mahasiswa/view/<?= $_username ?>">
        	<div class="tile-wide bg-cobalt fg-white" data-role="tile">
        			<div class="tile-content iconic">
                    <span class="icon mif-user"></span>
                    </div>
                    <span class="tile-label">PROFIL MAHASISWA</span>
        	</div>
        </a>
        <a href="<?= $_url ?>krs/view/<?= $_username ?>">
        	<div class="tile-wide bg-lightBlue fg-white" data-role="tile">
        			<div class="tile-content iconic">
                    <span class="icon mif-calendar"></span>
                    </div>
                    <span class="tile-label">KRS</span>
        	</div>
        </a>
        <a href="<?= $_url ?>user/change-password">
        	<div class="tile-wide bg-magenta fg-white" data-role="tile">
        			<div class="tile-content iconic">
                    <span class="icon mif-key"></span>
                    </div>
                    <span class="tile-label">CHANGE PASSWORD</span>
        	</div>
        </a>
    <?php endif; ?>

    </div>
</div>