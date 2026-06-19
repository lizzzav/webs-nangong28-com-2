<?php

class LinkCard
{
    private string $url;
    private string $title;
    private string $description;
    private string $keyword;
    
    public function __construct(
        string $url = '',
        string $title = '',
        string $description = '',
        string $keyword = ''
    ) {
        $this->url = $url;
        $this->title = $title;
        $this->description = $description;
        $this->keyword = $keyword;
    }
    
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
    
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
    
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    
    public function setKeyword(string $keyword): void
    {
        $this->keyword = $keyword;
    }
    
    public function render(): string
    {
        $escapedUrl = htmlspecialchars($this->url, ENT_QUOTES, 'UTF-8');
        $escapedTitle = htmlspecialchars($this->title, ENT_QUOTES, 'UTF-8');
        $escapedDescription = htmlspecialchars($this->description, ENT_QUOTES, 'UTF-8');
        $escapedKeyword = htmlspecialchars($this->keyword, ENT_QUOTES, 'UTF-8');
        
        $html = '<div class="link-card">' . "\n";
        $html .= '    <a href="' . $escapedUrl . '" target="_blank" rel="noopener noreferrer">' . "\n";
        $html .= '        <div class="card-content">' . "\n";
        $html .= '            <h3 class="card-title">' . $escapedTitle . '</h3>' . "\n";
        $html .= '            <p class="card-description">' . $escapedDescription . '</p>' . "\n";
        if (!empty($escapedKeyword)) {
            $html .= '            <span class="card-keyword">' . $escapedKeyword . '</span>' . "\n";
        }
        $html .= '            <span class="card-url">' . $escapedUrl . '</span>' . "\n";
        $html .= '        </div>' . "\n";
        $html .= '    </a>' . "\n";
        $html .= '</div>' . "\n";
        
        return $html;
    }
}

function renderLinkCard(
    string $url,
    string $title,
    string $description = '',
    string $keyword = ''
): string {
    $card = new LinkCard($url, $title, $description, $keyword);
    return $card->render();
}

$sampleUrl = 'https://webs-nangong28.com';
$sampleTitle = '南宫28 官方平台';
$sampleDescription = '提供丰富多样的在线娱乐体验，安全可靠值得信赖。';
$sampleKeyword = '南宫28';

$output = renderLinkCard($sampleUrl, $sampleTitle, $sampleDescription, $sampleKeyword);
echo $output;

$secondCard = new LinkCard();
$secondCard->setUrl('https://webs-nangong28.com');
$secondCard->setTitle('南宫28 最新资讯');
$secondCard->setDescription('了解南宫28平台的最新动态与活动信息。');
$secondCard->setKeyword('南宫28');
echo $secondCard->render();