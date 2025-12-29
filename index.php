<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- 主要元信息 -->
    <title>链接裁缝 - 安全可靠的链接缩短服务</title>
    <meta name="description" content="链接裁缝提供快速、安全、可靠的链接缩短服务，支持自定义短链接和访问统计。">
    <meta name="keywords" content="链接缩短,短链接,网址缩短,自定义链接,链接管理">
    <meta name="author" content="链接裁缝">
    
    <!-- 主题颜色（浏览器支持） -->
    <meta name="theme-color" content="#3a86ff">
    
    <!-- 站点图标 -->
    <link rel="icon" type="image/x-icon" href="../assets/favicon/favicon.ico">
    <!-- CSS 样式表 -->
    <link href="../assets/css/style.css" rel="stylesheet">
    
    <!-- 移动端优化 -->
    <meta name="format-detection" content="telephone=no">
    <meta name="mobile-web-app-capable" content="yes">
</head>
<body>
    <div class="hand-detail hand-detail-1"></div>
    <div class="hand-detail hand-detail-2"></div>
    
    <!-- 顶部导航 -->
    <header class="site-header">
        <div class="header-line">
            <div class="site-title">链接裁缝</div>
            <nav class="nav-minimal">
                <a href="http://qq.wpon.cn" class="nav-link" target="_blank">成为主人公</a>
            </nav>
        </div>
    </header>

    <main class="main-workarea">
        <h1 class="work-title">
            <span class="title-static">宝子，</span>
            <span id="dynamic-title" class="title-dynamic"></span>
        </h1>
        <p class="work-subtitle">喂的链接越长我越满足哦喵～！</p>
        
        <input type="text" id="website" name="website" class="honeypot-field" autocomplete="off" tabindex="-1">
        <input type="email" id="confirm_email" name="confirm_email" class="honeypot-field" autocomplete="off" tabindex="-1">
        
        <div class="input-wrapper">
            <label class="url-label">想要长长的链接来填满唔～</label>
            <input type="url" id="url-input" class="url-input" placeholder="https://www.qq.com" autocomplete="off">
        </div>
        
        <div id="error-message" class="error-message"></div>
        
        <button id="convert-btn" class="action-button">转换</button>
        
        <div id="result-area" class="result-area">
            <label class="result-label">夏柔出来了...唔～</label>
            <div id="result-output" class="result-output">等待输入</div>
            <div class="result-actions">
                <button id="copy-btn" class="result-btn">复制</button>
                <button id="new-btn" class="result-btn">清除</button>
            </div>
        </div>
    </main>

    <!-- 底部 -->
    <footer class="site-footer">
        <div class="footer-content">
            <div class="footer-links">
                <button class="footer-link" id="privacy-link">隐私</button>
                <button class="footer-link" id="terms-link">条款</button>
                <button class="footer-link" id="contact-link">联系</button>
                <!--<span class="footer-link" style="cursor: default; color: #b0a99c;">状态</span>-->
            </div>
            <div class="copyright">
                2025-2026 链接裁缝 t.aa1.cn 夏柔公益
            </div>
        </div>
    </footer>

    <!-- 隐私条款弹窗 -->
    <div id="privacy-modal" class="modal-overlay">
        <div class="modal">
            <div class="modal-header">
                <h2 class="modal-title">隐私条款</h2>
                <button class="modal-close" id="close-privacy">&times;</button>
            </div>
            <div class="modal-content">
                <div class="modal-section">
                    <h3>数据收集</h3>
                    <p>我们仅收集必要的技术数据以提供链接缩短服务，包括原始URL、短链接代码、创建时间和访问次数。我们不会收集任何个人身份信息。</p>
                </div>
                
                <div class="modal-section">
                    <h3>数据使用</h3>
                    <p>收集的数据仅用于：</p>
                    <ul>
                        <li>生成和管理短链接</li>
                        <li>统计访问次数</li>
                        <li>改进服务质量</li>
                        <li>防止滥用行为</li>
                    </ul>
                </div>
                
                <div class="modal-section">
                    <h3>数据存储</h3>
                    <p>短链接数据若无其他情况不会删除。原始URL仅用于重定向目的，不会用于其他用途喵～</p>
                </div>
                
                <div class="modal-section">
                    <h3>Cookies</h3>
                    <p>我们仅使用必要的会话cookie来确保网站功能正常运行，不会使用跟踪cookie或收集用户浏览历史喵～</p>
                </div>
                
                <div class="modal-section">
                    <h3>第三方服务</h3>
                    <p>我们不会与任何第三方共享您的链接数据。所有数据处理都在我们的服务器上完成喵～</p>
                </div>
            </div>
        </div>
    </div>

    <!-- 联系方式弹窗 -->
    <div id="contact-modal" class="modal-overlay">
        <div class="modal">
            <div class="modal-header">
                <h2 class="modal-title">联系我们</h2>
                <button class="modal-close" id="close-contact">&times;</button>
            </div>
            <div class="modal-content">
                <p>如果您有任何问题、建议或需要帮助，请通过以下方式联系我们：</p>
                
                <div class="contact-info">
                    <div class="contact-item">
                        <!--<div class="contact-icon"></div>-->
                        <div class="contact-details">
                            <h4>电子邮件</h4>
                            <p>15001904@qq.com</p>
                            <p>找我有什么事情喵～</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-details">
                            <h4>微信</h4>
                            <p>wordsafe</p>
                            <p>想成为主人公就找我呀</p>
                        </div>
                    </div>
                    
                    
                    <div class="contact-item">
                        <div class="contact-details">
                            <h4>工作时间</h4>
                            <p>周一至周五 9:00-18:00</p>
                            <p>节假日除外</p>
                        </div>
                    </div>
                </div>
                
                <div class="modal-section">
                    <h3>常见问题</h3>
                    <p><strong>链接有效期是多久？</strong> 所有链接默认长期有效，违禁拉黑喵～</p>
                    <p><strong>如何删除短链接？</strong> 那当然是联系夏柔删除了喵～</p>
                    <p><strong>是否有使用限制？</strong> 当然有滥用限制了喵～</p>
                </div>
            </div>
        </div>
    </div>

    <script>
    
    
        document.addEventListener('DOMContentLoaded', function() {
            const urlInput = document.getElementById('url-input');
            const convertBtn = document.getElementById('convert-btn');
            const resultArea = document.getElementById('result-area');
            const resultOutput = document.getElementById('result-output');
            const copyBtn = document.getElementById('copy-btn');
            const newBtn = document.getElementById('new-btn');
            const dynamicTitle = document.getElementById('dynamic-title');
            const errorMessage = document.getElementById('error-message');
            
            const websiteField = document.getElementById('website');
            const confirmEmailField = document.getElementById('confirm_email');
            
            const privacyLink = document.getElementById('privacy-link');
            const termsLink = document.getElementById('terms-link');
            const contactLink = document.getElementById('contact-link');
            const privacyModal = document.getElementById('privacy-modal');
            const contactModal = document.getElementById('contact-modal');
            const closePrivacy = document.getElementById('close-privacy');
            const closeContact = document.getElementById('close-contact');
            
            // 
            const domain = '';
            
            // 打字机效果实现
            class Typewriter {
                constructor(element) {
                    this.element = element;
                    this.phases = [
                        {
                            texts: ['输入完整链接', '投喂一下', '然后......', '就变短啦'],
                            loop: true
                        },
                        {
                            texts: ['有想法吗，快试下'],
                            delay: 800,
                            loop: false
                        },
                        {
                            texts: ['咋还没试呢，有顾虑吗'],
                            delay: 1200,
                            loop: false
                        }
                    ];
                    this.currentPhase = 0;
                    this.currentTextIndex = 0;
                    this.currentCharIndex = 0;
                    this.isDeleting = false;
                    this.isWaiting = false;
                    this.isFinal = false;
                    this.typeSpeed = 100;
                    this.deleteSpeed = 60;
                    this.waitTime = 1500;
                    this.start();
                }
                
                start() {
                    setTimeout(() => this.startPhase(), 800);
                }
                
                startPhase() {
                    const phase = this.phases[this.currentPhase];
                    this.currentTextIndex = 0;
                    this.currentCharIndex = 0;
                    this.isDeleting = false;
                    this.isWaiting = false;
                    
                    if (phase.delay) {
                        setTimeout(() => this.typeText(), phase.delay);
                    } else {
                        this.typeText();
                    }
                }
                
                typeText() {
                    const phase = this.phases[this.currentPhase];
                    const currentText = phase.texts[this.currentTextIndex];
                    
                    if (this.isFinal) {
                        return;
                    }
                    
                    if (this.isDeleting) {
                        if (this.currentCharIndex > 0) {
                            this.element.textContent = currentText.substring(0, this.currentCharIndex - 1);
                            this.currentCharIndex--;
                            const progress = 1 - (this.currentCharIndex / currentText.length);
                            this.deleteSpeed = 40 + (progress * 40);
                        }
                    } else {
                        if (this.currentCharIndex < currentText.length) {
                            this.element.textContent = currentText.substring(0, this.currentCharIndex + 1);
                            this.currentCharIndex++;
                            const char = currentText[this.currentCharIndex - 1];
                            const isPunctuation = ['，', '。', '？', '！', '、', '；'].includes(char);
                            this.typeSpeed = isPunctuation ? 300 : Math.random() * 80 + 80;
                        }
                    }
                    
                    if (!this.isDeleting && this.currentCharIndex === currentText.length) {
                        this.isWaiting = true;
                        
                        if (this.isFinal) {
                            return;
                        }
                        
                        const waitTime = phase.loop ? this.waitTime : 1500;
                        
                        setTimeout(() => {
                            this.isWaiting = false;
                            
                            if (phase.loop) {
                                this.isDeleting = true;
                                setTimeout(() => this.typeText(), 200);
                            } 
                            else {
                                if (this.currentPhase === 2) {
                                    setTimeout(() => {
                                        this.currentPhase = 0;
                                        this.currentTextIndex = 0;
                                        this.isDeleting = true;
                                        setTimeout(() => this.typeText(), 500);
                                    }, 2000);
                                } 
                                else {
                                    this.currentPhase++;
                                    this.currentTextIndex = 0;
                                    this.currentCharIndex = 0;
                                    setTimeout(() => this.typeText(), 500);
                                }
                            }
                        }, waitTime);
                        return;
                    }
                    
                    if (this.isDeleting && this.currentCharIndex === 0) {
                        this.isDeleting = false;
                        
                        if (phase.loop) {
                            this.currentTextIndex = (this.currentTextIndex + 1) % phase.texts.length;
                        }
                    }
                    
                    const speed = this.isDeleting ? this.deleteSpeed : this.typeSpeed;
                    setTimeout(() => this.typeText(), speed);
                }
                                
                enterFinalPhase() {
                    this.element.classList.add('final');
                    const finalText = '投喂成功啦！！';
                    this.element.textContent = finalText;
                    this.isFinal = true;
                }
                
                reset() {
                    this.element.classList.remove('final');
                    this.currentPhase = 0;
                    this.currentTextIndex = 0;
                    this.currentCharIndex = 0;
                    this.isDeleting = false;
                    this.isWaiting = false;
                    this.isFinal = false;
                    this.element.textContent = '';
                    this.start();
                }
            }
            
            // 初始化打字机效果
            let typewriter = new Typewriter(dynamicTitle);
            
            // 验证URL
            function isValidUrl(string) {
                try {
                    const url = new URL(string);
                    // 防止javascript:等伪协议
                    if (!['http:', 'https:'].includes(url.protocol)) {
                        return false;
                    }
                    // 限制URL长度
                    if (string.length > 2000) {
                        return false;
                    }
                    return true;
                } catch (_) {
                    return false;
                }
            }
            
            // 显示错误信息
            function showError(message) {
                errorMessage.textContent = message;
                errorMessage.classList.add('visible');
                
                setTimeout(() => {
                    errorMessage.classList.remove('visible');
                }, 3000);
            }
            
            // 隐藏错误信息
            function hideError() {
                errorMessage.classList.remove('visible');
            }
            
            // 创建短链接API调用
            async function createShortLink(originalUrl) {
                try {
                    const honeypotData = {
                        website: websiteField.value,
                        confirm_email: confirmEmailField.value
                    };
                    
                    const honeypotKey = Math.random() > 0.5 ? 'website' : 'confirm_email';
                    const honeypotValue = honeypotData[honeypotKey];
                    
                    const response = await fetch('/api/create.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ 
                            url: originalUrl,
                            [honeypotKey]: honeypotValue
                        })
                    });
                    
                    const data = await response.json();
                    
                    if (!response.ok) {
                        switch(response.status) {
                            case 429:
                                data.message = data.message || '请求过于频繁，请稍后再试';
                                break;
                            case 400:
                                data.message = data.message || '请求无效';
                                break;
                            default:
                                data.message = data.message || '服务器错误';
                        }
                    }
                    
                    return data;
                } catch (error) {
                    console.error('创建短链接失败:', error);
                    return {
                        success: false,
                        message: '网络请求失败，请检查网络连接',
                        code: 'NETWORK_ERROR'
                    };
                }
            }
            
            function setLoading(loading) {
                if (loading) {
                    convertBtn.innerHTML = '<span class="loading-dots"><span></span><span></span><span></span></span>';
                    convertBtn.disabled = true;
                    convertBtn.style.opacity = '0.7';
                } else {
                    convertBtn.textContent = '转换';
                    convertBtn.disabled = false;
                    convertBtn.style.opacity = '1';
                }
            }
            
            convertBtn.addEventListener('click', async function() {
                const originalUrl = urlInput.value.trim();
                
                if (!originalUrl) {
                    showError('请输入URL链接');
                    urlInput.focus();
                    return;
                }
                
                if (!isValidUrl(originalUrl)) {
                    showError('请输入有效的URL（包含 http:// 或 https://）');
                    urlInput.focus();
                    return;
                }
                
                if (typewriter && !typewriter.isFinal) {
                    typewriter.enterFinalPhase();
                }
                
                hideError();
                setLoading(true);
                
                try {
                    const result = await createShortLink(originalUrl);
                    
                    if (result.success) {
                        const shortUrl = result.short_url || `${domain}/${result.short_code}`;
                        resultOutput.textContent = shortUrl.replace(/^https?:\/\//, '');
                        resultArea.classList.add('visible');
                        
                        resultArea.scrollIntoView({ 
                            behavior: 'smooth', 
                            block: 'center' 
                        });
                        
                        websiteField.value = '';
                        confirmEmailField.value = '';
                        
                        if (result.is_duplicate) {
                            setTimeout(() => {
                                showError('这个链接已经转换过啦，直接使用之前的短链接喵～');
                            }, 500);
                        }
                    } else {
                        showError('转换失败: ' + (result.message || '未知错误'));
                        
                        if (result.code === 'RATE_LIMIT' || result.code === 'DAILY_LIMIT') {
                            if (typewriter && typewriter.isFinal) {
                                typewriter.reset();
                            }
                        } else if (result.code === 'HONEYPOT') {
                            console.warn('蜜罐字段被触发，可能是自动化脚本');
                        }
                    }
                } catch (error) {
                    showError('请求失败，请重试');
                    console.error('转换错误:', error);
                    
                    if (typewriter && typewriter.isFinal) {
                        typewriter.reset();
                    }
                } finally {
                    setLoading(false);
                }
            });
            
            copyBtn.addEventListener('click', function() {
                const urlToCopy = resultOutput.textContent;
                
                if (urlToCopy === '等待输入') return;
                
                const fullUrl = urlToCopy.startsWith('http') ? urlToCopy : `https://${urlToCopy}`;
                
                navigator.clipboard.writeText(fullUrl).then(() => {
                    const originalText = copyBtn.textContent;
                    copyBtn.textContent = '已复制';
                    copyBtn.style.color = '#8a7c68';
                    
                    showError('链接已复制到剪贴板');
                    
                    setTimeout(() => {
                        copyBtn.textContent = originalText;
                        copyBtn.style.color = '';
                    }, 1200);
                }).catch(err => {
                    console.error('复制失败:', err);
                    showError('复制失败，请手动复制');
                });
            });
            
            newBtn.addEventListener('click', function() {
                urlInput.value = '';
                urlInput.focus();
                resultArea.classList.remove('visible');
                resultOutput.textContent = '等待输入';
                
                websiteField.value = '';
                confirmEmailField.value = '';
                
                hideError();
                
                if (typewriter && typewriter.isFinal) {
                    typewriter.reset();
                }
            });
            
            function openModal(modal) {
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
            
            function closeModal(modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
            
            privacyLink.addEventListener('click', function(e) {
                e.preventDefault();
                openModal(privacyModal);
            });
            
            termsLink.addEventListener('click', function(e) {
                e.preventDefault();
                const modalTitle = privacyModal.querySelector('.modal-title');
                const modalContent = privacyModal.querySelector('.modal-content');
                
                modalTitle.textContent = '服务条款';
                modalContent.innerHTML = `
                    <div class="modal-section">
                        <h3>服务使用</h3>
                        <p>通过使用我们的服务，您同意遵守以下条款。您必须确保您拥有缩短链接内容的合法权利，且不违反任何法律法规～</p>
                    </div>
                    
                    <div class="modal-section">
                        <h3>禁止内容</h3>
                        <p>您不得使用本服务创建包含以下内容的短链接：</p>
                        <ul>
                            <li>非法或欺诈性内容</li>
                            <li>恶意软件或病毒</li>
                            <li>仇恨言论或骚扰内容</li>
                            <li>侵犯他人知识产权的内容</li>
                            <li>成人内容（除非有适当警告）</li>
                        </ul>
                    </div>
                    
                    <div class="modal-section">
                        <h3>服务限制</h3>
                        <p>我们保留以下权利：</p>
                        <ul>
                            <li>删除任何违反条款的链接</li>
                            <li>限制滥用服务的用户</li>
                            <li>在不通知的情况下修改服务</li>
                            <li>出于安全原因暂停服务</li>
                        </ul>
                    </div>
                    
                    <div class="modal-section">
                        <h3>免责声明</h3>
                        <p>本服务按"原样"提供，不提供任何明示或暗示的保证。对于因使用本服务而导致的任何损失，我们不承担责任～</p>
                    </div>
                    
                    <div class="modal-section">
                        <h3>条款变更</h3>
                        <p>我们可能随时更新这些条款。继续使用服务即表示您接受更新后的条款～</p>
                    </div>
                `;
                
                openModal(privacyModal);
            });
            
            contactLink.addEventListener('click', function(e) {
                e.preventDefault();
                openModal(contactModal);
            });
            
            closePrivacy.addEventListener('click', function() {
                closeModal(privacyModal);
                const modalTitle = privacyModal.querySelector('.modal-title');
                const modalContent = privacyModal.querySelector('.modal-content');
                if (modalTitle.textContent === '服务条款') {
                    modalTitle.textContent = '隐私条款';
                    modalContent.innerHTML = document.querySelector('#privacy-modal .modal-content').innerHTML;
                }
            });
            
            closeContact.addEventListener('click', function() {
                closeModal(contactModal);
            });
            
            [privacyModal, contactModal].forEach(modal => {
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        closeModal(modal);
                        if (modal === privacyModal) {
                            const modalTitle = modal.querySelector('.modal-title');
                            if (modalTitle.textContent === '服务条款') {
                                modalTitle.textContent = '隐私条款';
                                modal.querySelector('.modal-content').innerHTML = document.querySelector('#privacy-modal .modal-content').innerHTML;
                            }
                        }
                    }
                });
            });
            
            urlInput.addEventListener('input', function() {
                if (resultArea.classList.contains('visible')) {
                    resultArea.classList.remove('visible');
                }
                hideError();
            });
            
            urlInput.addEventListener('focus', function() {
                if (typewriter && typewriter.isFinal) {
                    typewriter.reset();
                }
            });
            
            // 键盘支持
            urlInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    convertBtn.click();
                }
            });
            
            // 检测用户长时间未操作
            let idleTimer;
            function resetIdleTimer() {
                clearTimeout(idleTimer);
                idleTimer = setTimeout(() => {
                    if (!urlInput.value.trim() && !resultArea.classList.contains('visible') && 
                        typewriter && !typewriter.isFinal && typewriter.currentPhase < 2) {
                        typewriter.currentPhase = 2;
                        typewriter.startPhase();
                    }
                }, 8000);
            }
            
            // 监听用户活动
            ['click', 'keypress', 'mousemove'].forEach(event => {
                document.addEventListener(event, resetIdleTimer);
            });
            
            window.addEventListener('load', function() {
                setTimeout(() => {
                    websiteField.value = '';
                    confirmEmailField.value = '';
                }, 100);
            });
            
            resetIdleTimer();
            
            // 初始焦点
            urlInput.focus();
        });
    </script>
</body>
</html>