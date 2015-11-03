<?php
namespace Lametric;

class Lametric
{

    /**
     * The URL data is pushed to LaMetric's server
     *
     * @var string
     */
	private $_pushUrl = null;

    /**
     * Access token for application
     *
     * @var string
     */
	private $_token = null;

    /**
     * Icon number from LaMetric gallery
     *
     * @var mixed
     */
	private $_icon = 'i1759';

    /**
     * A list of HTTP headers required for authorization
     * 
     * @var array
     */
	private $_http_headers = array();

    /**
    * Constructor method
    * 
    * @param    array  $config   Set pushUrl and token variables
    * @return   void
    */
	public function __construct($config)
	{

		$this->setPushURL($config['pushURL']);
		$this->setToken($config['token']);

		$this->_http_headers = array(
			'Accept: application/json',
			'X-Access-Token: '.$this->_token,
			'Pragma: no-cache',
		);

	}

    /**
    * Set icon for notification
    * 
    * @param    integer  $code    Integer with icon number from gallery
    * @return   void
    */
	public function setIcon($code)
	{
		$this->_icon = 'i'. $code;
	}

    /**
    * Set push URL for API calls
    * 
    * @param    string  $pushUrl    String with pushUrl for Indicator App
    * @return   void
    */
	public function setPushURL($pushUrl)
	{
		$this->_pushUrl = $pushUrl;
	}

    /**
    * Set token API calls
    * 
    * @param    string  $token    String with application token
    * @return   void
    */
	public function setToken($token)
	{
		$this->_token = $token;
	}

    /**
    * Send push notification
    * 
    * @param    string  $text    String with desired push notification
    * @throws   Lametric\Exception           If push notification cannot be sent
    */
	public function push($text)
	{

		$data_string = json_encode(array(
				'frames'=>
				array(
					array('index'=>0,
						'text'=>$text,
						'icon'=>$this->_icon,
					))));

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->_pushUrl);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $this->_http_headers);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		$result = json_decode(curl_exec($ch));

		if(isset($result->error) && $result->error) {
			throw new LametricException($result->error->message . ' - '. $result->error->trace[0]);
		}

	}

}