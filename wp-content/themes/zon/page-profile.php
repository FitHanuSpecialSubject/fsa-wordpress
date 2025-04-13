<?php
/**
 * Template Name: Custom Profile Template like DHHU
 */
get_header();

if ( ! defined( 'ABSPATH' ) ) exit;

$user_id = um_user('ID');
?>

<style>
    body {
        font-family: Arial, sans-serif;
        font-size: 16px;
        margin: 0;
        background: #f5f5f5;
    }

    .um-custom-profile {
        display: flex;
        max-width: 1200px;
        margin: 40px auto;
        background: #fff;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    .um-profile-left {
        width: 30%;
        background: #2c3e50;
        color: #fff;
        text-align: center;
        padding: 40px 25px;
        box-sizing: border-box;
        font-family: 'Arial', sans-serif;
    }

    .um-profile-left img {
        border-radius: 50%;
        width: 150px;
        height: 150px;
        object-fit: cover;
        margin-bottom: 20px;
        border: 5px solid #fff;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .um-profile-left h2 {
        margin: 0 0 5px 0;
        font-size: 24px;
        font-weight: 700;
        letter-spacing: 1px;
        color: #fff;
    }

    .um-profile-left .sub-title {
        font-size: 16px;
        margin-bottom: 15px;
        color: #ecf0f1;
        font-weight: 500;
    }

    .um-profile-left .faculty-info, .um-profile-left .position-info {
        font-size: 14px;
        line-height: 1.6;
        margin: 15px 0;
        color: #bdc3c7;
    }

    .um-profile-left .social-title {
        margin: 30px 0 15px;
        font-size: 16px;
        font-weight: 600;
        color: #ecf0f1;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .um-profile-left .social-icons {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-bottom: 30px;
    }

    .um-profile-left .social-icons a {
        color: #fff;
        font-size: 20px;
        transition: color 0.3s;
    }

    .um-profile-left .social-icons a:hover {
        color: #3498db;
    }

    .um-profile-left .logout-area {
        margin-top: 30px;
    }

    .um-profile-left .um-logout-button {
        display: inline-block;
        padding: 8px 20px;
        background: #e74c3c;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
        transition: 0.3s;
    }

    .um-profile-left .um-logout-button:hover {
        background: #c0392b;
    }
    .um-profile-right {
        width: 70%;
        display: flex;
    }

    .tab-content-area {
        flex: 1;
        padding: 30px 30px 30px 30px;
        border-right: 1px solid #eee;
        max-height: 700px;
        overflow-y: auto;
    }

    .tab-content {
        display: none;
        width: 100%;
    }

    .tab-content.active {
        display: block;
        width: 100%;
    }

    /* Sidebar tab */
    .tab-sidebar {
        width: 100px;
        background: #f8f8f8;
        padding-top: 30px;
    }

    .tab-btn {
        display: block;
        padding: 20px;
        text-align: center;
        background: none;
        border: none;
        width: 100%;
        cursor: pointer;
        border-left: 4px solid transparent;
        transition: all 0.2s;
    }

    .tab-btn:hover, .tab-btn.active {
        background: #eee;
        border-left: 4px solid #0073aa;
        color: #0073aa;
    }

    .tab-btn i {
        font-size: 24px;
        margin-bottom: 5px;
    }

    .um-profile-table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    .um-profile-table td {
        padding: 12px 10px;
        border-bottom: 1px solid #eee;
        vertical-align: top;
    }

    .um-profile-table td:first-child {
        font-weight: bold;
        width: 160px;
        color: #555;
    }

    .um-profile-table i {
        margin-right: 10px;
        color: #555;
        width: 20px;
        text-align: center;
    }

    /* Bibliography */
    .bibliography-box {
        background: #f0f8ff;
        border-left: 4px solid #0073aa;
        padding: 20px;
        margin: 30px 0;
        line-height: 1.7;
    }

    /* Teaching area */
    .teaching-area-grid {
        margin-top: 30px;
    }

    .teaching-area-grid h3 {
        font-size: 20px;
        color: #0073aa;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid #ddd;
    }

    .teaching-boxes {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .teaching-box {
        flex: 1;
        min-width: 250px;
        background: #f9f9f9;
        padding: 25px;
        text-align: center;
        border: 1px solid #ddd;
        border-radius: 5px;
        transition: box-shadow 0.3s;
    }

    .teaching-box:hover {
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .teaching-box .icon {
        font-size: 30px;
        color: #0073aa;
        margin-bottom: 15px;
    }

    .teaching-box h4 {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .teaching-box p {
        font-size: 14px;
        color: #555;
    }

    #posts {
        overflow-y: auto;
        width: auto;
        border: 1px solid black;
    }

    .post-item {
        border-bottom: 1px solid #eee;
        width: 100%;
    }

    .post-item h4 {
        font-size: 18px;
        width: 100%;
    }

    .post-item h4 a {
        color: #2c3e50;
        text-decoration: none;
        transition: color 0.3s;
        display: block;
        width: 100%;
    }

    .post-item h4 a:hover {
        color: #3498db;
    }

    .post-date {
        display: block;
        font-size: 13px;
        color: #888;
        width: 100%;
    }

    .post-excerpt {
        font-size: 14px;
        line-height: 1.6;
        color: #555;
        width: 100%;
    }

    #edit-profile {
        max-width: 600px;
    }

    .contact-info-section, .contact-form-section, .social-links-section {
        margin-bottom: 30px;
    }

    .contact-info-section h4, .contact-form-section h4, .social-links-section h4 {
        font-size: 18px;
        color: #2c3e50;
        margin-bottom: 15px;
        padding-bottom: 8px;
        border-bottom: 2px solid #eee;
    }

    .contact-info-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .contact-info-table tr td {
        padding: 10px 5px;
        vertical-align: middle;
        border-bottom: 1px solid #eee;
    }

    .contact-info-table tr td:first-child {
        width: 30px;
        text-align: center;
        color: #3498db;
    }

    .contact-info-table tr td:nth-child(2) {
        width: 100px;
        font-weight: bold;
        color: #555;
    }

    .contact-form {
        max-width: 600px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #555;
    }

    .form-group input, .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-family: inherit;
        font-size: 14px;
    }

    .form-group textarea {
        height: 120px;
        resize: vertical;
    }

    .form-actions {
        display: flex;
        gap: 10px;
        margin-top: 15px;
    }

    .btn-clear, .btn-send {
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        transition: all 0.3s;
    }

    .btn-clear {
        background: #e74c3c;
        color: white;
    }

    .btn-send {
        background: #2ecc71;
        color: white;
    }

    .btn-clear:hover {
        background: #c0392b;
    }

    .btn-send:hover {
        background: #27ae60;
    }

    .social-links {
        display: flex;
        gap: 15px;
    }

    .social-links a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background: #2c3e50;
        color: white;
        border-radius: 50%;
        font-size: 18px;
        transition: all 0.3s;
    }

    .social-links a:hover {
        background: #3498db;
        transform: translateY(-3px);
    }
</style>


<div class="um-custom-profile">
    <div class="um-profile-left">
        <?php echo get_avatar( $user_id, 150 ); ?>
        <h2><?php echo strtoupper( um_user('display_name') ); ?></h2>
        <div class="sub-title">PGS.TS <?php echo um_user('full_name'); ?></div>
        <div class="faculty-info">
            Faculty of Information Technology,
            Haiphong University, Vietnam
        </div>
        <div>
            <p><?php echo um_user('description'); ?></p>
        </div>
        <div class="social-title">Research and Social ID</div>
        <div class="social-icons">
            <a href="#"><i class="fas fa-envelope"></i></a>
            <a href="#"><i class="fab fa-researchgate"></i></a>
            <a href="#"><i class="fab fa-orcid"></i></a>
            <a href="<?php echo esc_url( um_user('facebook') ); ?>" target="_blank">
                <i class="fab fa-facebook-f">
                        <?php if ( um_user('facebook') ) : ?><?php endif; ?>
                    </i>
            </a>
        </div>
        <div class="logout-area">
            <a href="<?php echo wp_logout_url( home_url() ); ?>" class="um-logout-button">Logout</a>
        </div>
    </div>

    <div class="um-profile-right">
        <div class="tab-content-area">
            <div id="profile" class="tab-content active">
                <h3>+ Profile - About Me</h3>
                <table class="um-profile-table">
                    <tr>
                        <td><i class="fas fa-user"></i> Name:</td>
                        <td><?php echo um_user('display_name'); ?></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-map-marker-alt"></i> Address:</td>
                        <td><?php echo um_user('address'); ?></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-envelope"></i> Email:</td>
                        <td><?php echo um_user('user_email'); ?></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-phone"></i> Phone:</td>
                        <td><?php echo um_user('phone_number'); ?></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-globe"></i> Website:</td>
                        <td><?php echo um_user('user_url'); ?></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-id-card"></i> Scopus ID:</td>
                        <td><?php echo um_user('scopus_id'); ?></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-search"></i> Web of Science:</td>
                        <td><?php echo um_user('web_of_science'); ?></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-fingerprint"></i> ORCID:</td>
                        <td><?php echo um_user('orcid'); ?></td>
                    </tr>
                </table>

                <div class="bibliography-box">
                    <h3>Bibliography</h3>
                    <?php echo um_user('bibliography'); ?>
                </div>

                <div class="teaching-area-grid">
                    <h3><i class="fas fa-chalkboard-teacher"></i> Teaching Areas</h3>

                    <div class="teaching-boxes">
                        <div class="teaching-box">
                            <div class="icon"><i class="fas fa-project-diagram"></i></div>
                            <h4>Software Analysis and Design</h4>
                            <p>The principles of software architecture, design patterns, and system modeling.</p>
                        </div>

                        <div class="teaching-box">
                            <div class="icon"><i class="fas fa-puzzle-piece"></i></div>
                            <h4>Game Theory and Stable Matching</h4>
                            <p>Strategic decision making, optimization, and algorithmic matching models.</p>
                        </div>

                        <div class="teaching-box">
                            <div class="icon"><i class="fas fa-mouse-pointer"></i></div>
                            <h4>Human-Computer Interaction</h4>
                            <p>User experience design, usability principles, and interaction techniques.</p>
                        </div>
                    </div>
                </div>


            </div>

            <div id="posts" class="tab-content">
                <h3>+ Posts</h3>
                <?php
                    $args = array(
                        'author' => $user_id,
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => 10,
                    );
                    $posts = get_posts( $args );

                    if ( ! empty( $posts ) ) :
                        foreach ( $posts as $post ) :
                            setup_postdata( $post ); ?>
                            <div class="post-item">
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <span class="post-date"><?php echo get_the_date(); ?></span>
                                <div class="post-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 30, '...' ); ?></div>
                            </div>
                        <?php
                        endforeach;
                        wp_reset_postdata();
                    else :
                        echo '<div class="um-profile-note"><span>This user has not created any posts.</span></div>';
                    endif;
                ?>
            </div>

            <div id="contact" class="tab-content">
                <h3>+ Contact Info</h3>
                
                <div class="contact-info-section">
                    <h4>CONTACT INFO</h4>
                    <table class="contact-info-table">
                        <tr>
                            <td><i class="fas fa-map-marker-alt"></i></td>
                            <td>Address:</td>
                            <td><?php echo um_user('address'); ?></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-envelope"></i></td>
                            <td>Email:</td>
                            <td><?php echo um_user('user_email'); ?></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-phone"></i></td>
                            <td>Phone:</td>
                            <td><?php echo um_user('phone_number'); ?></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-globe"></i></td>
                            <td>Website:</td>
                            <td><?php echo um_user('user_url'); ?></td>
                        </tr>
                        <tr>
                            <td><i class="fab fa-facebook"></i></td>
                            <td>Facebook:</td>
                            <td><?php echo um_user('facebook'); ?></td>
                        </tr>
                        <tr>
                            <td><i class="fab fa-google"></i></td>
                            <td>G. Drive:</td>
                            <td><?php echo um_user('google_drive'); ?></td>
                        </tr>
                        <tr>
                            <td><i class="fab fa-microsoft"></i></td>
                            <td>Skydrive:</td>
                            <td><?php echo um_user('skydrive'); ?></td>
                        </tr>
                    </table>
                </div>
                
                <div class="contact-form-section">
                    <h4>LET'S KEEP IN TOUCH</h4>
                    <form class="contact-form">
                        <div class="form-group">
                            <label for="contact-name">Your Name</label>
                            <input type="text" id="contact-name" placeholder="Name...">
                        </div>
                        <div class="form-group">
                            <label for="contact-email">Your Email</label>
                            <input type="email" id="contact-email" placeholder="Email...">
                        </div>
                        <div class="form-group">
                            <label for="contact-message">Your Message</label>
                            <textarea id="contact-message" placeholder="Message..."></textarea>
                        </div>
                        <div class="form-actions">
                            <button type="reset" class="btn-clear">CLEAR</button>
                            <button type="submit" class="btn-send">SEND MESSAGE</button>
                        </div>
                    </form>
                </div>
                
                <div class="social-links-section">
                    <h4>FOLLOW ME</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-researchgate"></i></a>
                        <a href="#"><i class="fab fa-google-scholar"></i></a>
                    </div>
                </div>
            </div>

            <div id="edit-profile" class="tab-content">
                <h3>+ Edit Profile</h3>
                <div style="max-width: 600px;">
                    <?php echo do_shortcode('[ultimatemember form_id="104"]'); ?>
                </div>
            </div>
        </div>

        <div class="tab-sidebar">
            <button class="tab-btn active" onclick="showTab('profile')">
                <i class="fas fa-user fa-2x"></i>
            </button>
            <button class="tab-btn" onclick="showTab('posts')">
                <i class="fas fa-newspaper fa-2x"></i>
            </button>
            <button class="tab-btn" onclick="showTab('contact')">
                <i class="fas fa-envelope fa-2x"></i>
            </button>
            <button class="tab-btn" onclick="showTab('edit-profile')">
                <i class="fas fa-edit fa-2x"></i>
            </button>
        </div>

    </div>
</div>

<script>
function showTab(tabId) {
    const contents = document.querySelectorAll('.tab-content');
    contents.forEach(c => c.classList.remove('active'));
    document.getElementById(tabId).classList.add('active');

    const btns = document.querySelectorAll('.tab-btn');
    btns.forEach(btn => btn.classList.remove('active'));
    const clickedBtn = Array.from(btns).find(btn => btn.getAttribute('onclick').includes(tabId));
    if (clickedBtn) clickedBtn.classList.add('active');
}
</script>

<?php get_footer(); ?>
