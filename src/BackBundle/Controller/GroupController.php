<?phpnamespace BackBundle\Controller;use Symfony\Bundle\FrameworkBundle\Controller\Controller;use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;use Symfony\Component\HttpFoundation\Response;use BackBundle\Entity\User;use Symfony\Component\Ldap\LdapClient;/** * Class UserController * @package BackBundle\Controller * @Route("/groups") */class GroupController extends Controller{        /**     * @Route("/all", name="back_group_list")     * @return RedirectResponse|Response     */    function listGroupAction()    {        $ad = $this->get("ldap_service");        $adGroups = $ad->getAllGroup();        return $this->render('BackBundle:Group:list.html.twig', array(            "groups" => $adGroups,        ));    }}/* *  *  *         $data = null;        $OU = null;        $base = $this->container->getParameter('ldap_base_dn');        $ldap->bind($this->container->getParameter('ldap_search_dn'), $this->container->getParameter('ldap_pass'));        if ($ldap && $base) {            $query = "(&(objectClass=User)(objectClass=person)(!(objectClass=computer)))";            if ($OU == null) {                $tree = $base;            } else {                $tree = "OU=Users," . "OU=" . $OU . "," . $base;            }            $search = $ldap->find($base, $query);        }        dump($search); */